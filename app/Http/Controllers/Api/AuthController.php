<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Traits\GenralTraits;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    use GenralTraits;

    //************************************************ * Register * ************************************************
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|unique:clients|digits:11',
            'donation_last_date' => 'required|date_format:Y-m-d',
            'birth_date' => 'required|date_format:Y-m-d',
            'blood_type_id' => 'required|exists:blood_types,id',
            'password' => 'required|confirmed',
            'email' => 'required|unique:clients|email',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(0, 'فشل التحقق من البيانات', $validator->errors());
        }

      
        $request->merge(['password' => Hash::make($request->password)]);


        $client = Client::create($request->except('password_confirmation'));

    
        $accessToken = $client->createToken('authToken')->plainTextToken;


        $client->governorates()->sync($client->city->governorate_id);
        $client->bloodTypes()->sync($request->blood_type_id);

        return $this->responseJson(1, 'تم إضافة العميل بنجاح', [
            'token' => $accessToken,
            'data' => $client->load('city.governorate', 'bloodTypes'),
        ]);
    }

    //***************************************** * Login * ****************************************************
    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(0, 'فشل التحقق من البيانات', $validator->errors());
        }

     
        $client = Client::where('phone', $request->phone)->firstOrFail();

        if (Hash::check($request->password, $client->password)) {
            

            $accessToken = $client->createToken('authToken')->plainTextToken;

            return $this->responseJson(1, 'تم الدخول بنجاح', [
                'token' => $accessToken, 
                'client' => $client->load('city.governorate', 'bloodTypes')
            ]);
        } else {
            return $this->responseJson(0, 'بيانات الدخول غير صحيحة', null);
        }
    }

    //------------------------------- reset ------------------------------------------------
    public function reset(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required|digits:11'
        ]);

        if ($validator->fails()) {
            return $this->responseJson(0, 'فشل التحقق من البيانات', $validator->errors());
        }

        $user = Client::where('phone', $request->phone)->first();

        if ($user) {
            $code = rand(1111, 9999);
            $user->update(['pin_code' => $code]);

            if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($user->email)
                    ->bcc("yasserfarag575@gmail.com")
                    ->send(new ResetPassword($code));
                return $this->responseJson(1, 'برجاء فحص بريدك الإلكتروني', [
                    'pin_code_for_test' => $code,
                ]);
            } else {
                return $this->responseJson(0, 'البريد الإلكتروني غير صالح', null);
            }
        } else {
            return $this->responseJson(0, 'لا يوجد أي حساب مرتبط بهذا الهاتف', null);
        }
    }

    //------------------------------- newPassword ------------------------------------------------
    public function newPassword(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'pin_code' => 'required|digits:4',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|digits:11',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(0, 'فشل التحقق من البيانات', $validator->errors());
        }

        $user = Client::where('pin_code', $request->pin_code)
            ->where('phone', $request->phone)
            ->first();

        if (!$user) {
            return $this->responseJson(0, 'هذا الكود غير صالح أو الهاتف غير متطابق', null);
        }

        $user->password = Hash::make($request->password);
        $user->pin_code = null;

        if ($user->save()) {
            return $this->responseJson(1, 'تم تغيير كلمة المرور بنجاح', null);
        } else {
            return $this->responseJson(0, 'حدث خطأ أثناء حفظ البيانات، حاول مرة أخرى', null);
        }
    }

    //------------------------------- profile ------------------------------------------------
    public function profile(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'password' => 'nullable|confirmed|min:6',
            'email' => ['nullable', 'email', Rule::unique('clients')->ignore($request->user()->id)],
            'phone' => ['nullable', 'digits:11', Rule::unique('clients')->ignore($request->user()->id)],
        ]);

        if ($validator->fails()) {
            return $this->responseJson(0, 'فشل التحقق من البيانات', $validator->errors());
        }

        $logUser = $request->user();
        $logUser->update($request->except(['password', 'password_confirmation']));

        if ($request->has('password')) {
            $logUser->password = Hash::make($request->password);
        }
        $logUser->save();

        $data = [
            'client' => $request->user()->fresh()->load('city.governorate', 'bloodTypes')
        ];
        return $this->responseJson(1, 'تم تحديث البيانات', $data);
    }

    //------------------------------- registerToken ------------------------------------------------
    public function registerToken(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'token' => 'required|string',
            'type' => 'required|in:android,ios'
        ]);

        if ($validator->fails()) {
            return $this->responseJson(0, 'فشل التحقق من البيانات', $validator->errors());
        }

        $user = $request->user();
        if (!$user) {
            return $this->responseJson(0, 'المستخدم غير مصرح له', null);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->type)->plainTextToken;

        return $this->responseJson(1, 'تم التسجيل بنجاح', ['token' => $token]);
    }

    //------------------------------- removeToken ------------------------------------------------
    public function removeToken(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'token' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->responseJson(0, 'فشل التحقق من البيانات', $validator->errors());
        }

        $token = PersonalAccessToken::findToken($request->token);

        if (!$token) {
            return $this->responseJson(0, 'الرمز غير موجود', null);
        }

        $token->delete();

        return $this->responseJson(1, 'تم الحذف بنجاح', null);
    }

    //------------------------------- notificationsSettings ------------------------------------------------
    public function notificationsSettings(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'governorates.*' => 'exists:governorates,id',
            'blood_types.*' => 'exists:blood_types,id',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(0, 'فشل التحقق من البيانات', $validator->errors());
        }

        if ($request->has('governorates')) {
            $request->user()->governorates()->sync($request->governorates);
        }
        if ($request->has('blood_types')) {
            $request->user()->bloodTypes()->sync($request->blood_types);
        }

        $data = [
            'governorates' => $request->user()->governorates()->pluck('id')->toArray(),
            'blood_types' => $request->user()->bloodTypes()->pluck('id')->toArray(),
        ];
        return $this->responseJson(1, 'تم التحديث', $data);
    }
}
