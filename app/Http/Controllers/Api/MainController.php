<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Traits\GenralTraits;

class MainController extends Controller
{
    use GenralTraits;

    /*******************************************  **    categories   **  **************************************************************** */
    public function categories()
    {
        $categories = Category::all();
        return $this->responseJson(1, 'success', $categories);
    }

    /*******************************************  **    posts   **  **************************************************************** */
    public function posts(Request $request)
    {
        $posts = Post::with('category')->when($request->category_id, function($query) use($request) {
            $query->where('category_id', $request->category_id);
        })->when($request->keyword, function($query) use($request) {
            $query->searchByKeyword($request);
        })->latest()->paginate(20);

        return $this->responseJson(1, 'success', $posts);
    }

    /*******************************************  **    post    **  **************************************************************** */
    public function post(Request $request)
    {
        $post = Post::with('category')->find($request->post_id);

        if ($post) {
            return $this->responseJson(1, 'success', $post);
        } else {
            return $this->responseJson(0, 'Post not found', null);
        }
    }

    /*******************************************  **    governorates   **  **************************************************************** */
    public function governorates()
    {
        $governorates = Governorate::all();
        return $this->responseJson(1, 'success', $governorates);
    }

    /*******************************************  **    cities   **  **************************************************************** */
    public function cities()
    {
        $governorateId = request()->query('governorate_id');
        $query = City::with('governorate:id,name');

        if ($governorateId) {
            $query->where('governorate_id', $governorateId);
        }

        $cities = $query->get();
        return $this->responseJson(1, 'success', $cities);
    }

    /*******************************************  **    postFavorite   **  **************************************************************** */
    public function postFavorite(Request $request)
    {
        $rules = [
            'post_id' => 'required|exists:posts,id', // Corrected table name
        ];

        $validator = validator()->make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $toggle = $request->user()->posts()->toggle($request->post_id);
        return $this->responseJson(1, 'success', $toggle);
    }

    /*******************************************  **    myFavourites   **  **************************************************************** */
    public function myFavourites(Request $request)
    {
        $posts = $request->user()->posts()->latest()->paginate(20);
        return $this->responseJson(1, 'Loaded...', $posts);
    }

    /*******************************************  **    donationRequestCreate   **  **************************************************************** */
    public function donationRequestCreate(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'age' => 'required|digits_between:1,3',
            'blood_type_id' => 'required|exists:blood_types,id',
            'bags' => 'required|digits:1',
            'hospital_location' => 'required|string',
            'hospital_name' => 'nullable|string',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|digits:11',
        ];
    
        $validator = validator()->make($request->all(), $rules);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->responseJson(0, $errors->first(), $errors);
        }
    
       
        $donationRequest = $request->user()->donationRequests()->create($request->all());

        $clientIds = $donationRequest->city->governorate->clients()
            ->whereHas('bloodTypes', function ($query) use ($donationRequest) {
                $query->where('blood_types.id', $donationRequest->blood_type_id);
            })
            ->select('clients.id')
            ->pluck('id')
            ->toArray();
    
        if (count($clientIds) > 0) {
      
            $notification = Notification::create([
                'title' => 'يوجد حالة تبرع قريبة منك',
                'content' => $donationRequest->bloodType->name . ' محتاج متبرع لفصيلة ' . $donationRequest->bloodType->name,
            ]);
    
            
            $notification->clients()->attach($clientIds);
        }
    
        return $this->responseJson(1, 'تم الإضافة بنجاح', $donationRequest->load('client', 'city'));
    }
    
    

    /*******************************************  **    donationRequests   **  **************************************************************** */
    public function donationRequests(Request $request)
    {
        $donations = DonationRequest::query()
            ->when($request->governorate_id, function ($query, $governorateId) {
                $query->whereRelation('city', 'governorate_id', $governorateId);
            })
            ->when($request->city_id, function ($query, $cityId) {
                $query->where('city_id', $cityId);
            })
            ->when($request->blood_type_id, function ($query, $bloodTypeId) {
                $query->where('blood_type_id', $bloodTypeId);
            })
            ->with('city.governorate', 'client', 'bloodType')
            ->latest()
            ->paginate();

        return $this->responseJson(1, 'success', $donations);
    }

    /*******************************************  **    donationRequest   **  **************************************************************** */
    public function donationRequest(Request $request)
    {
        $donation = DonationRequest::with('city', 'client', 'bloodType')->find($request->donation_id);

        if ($donation) {
            $notification = $request->user()->notifications()->where('donation_request_id', $donation->id)->first();
            if ($notification) {
                $request->user()->notifications()->updateExistingPivot($notification->id, [
                    'is_read' => 1
                ]);
            }

            return $this->responseJson(1, 'success', $donation);
        } else {
            return $this->responseJson(0, 'لا يوجد طلب', null);
        }
    }

    /*******************************************  **    contactUs   **  **************************************************************** */
    public function contactUs(Request $request)
    {
        $rules = [
            'subject' => 'required',
            'message' => 'required',
        ];

        $validator = validator()->make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->responseJson(0, $errors->first(), $errors);
        }

        $contact = $request->user()->contacts()->create($request->all());
        return $this->responseJson(1, 'تم الإرسال بنجاح', $contact);
    }

    /*******************************************  **    bloodTypes   **  **************************************************************** */
    public function bloodTypes()
    {
        $bloodTypes = BloodType::all();
        return $this->responseJson(1, 'success', $bloodTypes);
    }

    /*******************************************  **    notificationsCount   **  **************************************************************** */
    public function notificationsCount(Request $request)
    {
        $count = $request->user()->notifications()->where('is_read', 0)->count();
        return $this->responseJson(1, 'Loaded...', [
            'notifications-count' => $count
        ]);
    }

    /*******************************************  **    notifications   **  **************************************************************** */
    public function notifications(Request $request)
    {
        $data = $request->user()->notifications()->latest()->paginate(20);
        return $this->responseJson(1, 'Loaded...', $data);
    }

    /*******************************************  **    settings   **  **************************************************************** */
    public function settings()
    {
        $settings = Setting::all();
        return $this->responseJson(1, 'success', $settings);
    }
}
