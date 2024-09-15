<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::paginate(20);
        return view('dahsboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('dahsboard.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email',
            'roles_list' => 'required'
        ];
        
        $messages = [
            'name.required' => 'الاسم مطلوب',
            'password.required' => 'كلمة السر مطلوبة',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صالح',
            'roles_list.required' => 'الرتب مطلوبة',
            'password.confirmed' => 'كلمة السر غير متطابقة',
        ];
        
        $this->validate($request, $rules, $messages);
        
        $request->merge(['password'=>bcrypt($request->password)]);
        $user=User::create($request->except('roles_list'));
        $user->roles()->attach($request->input('roles_list'));
        return redirect(route('users.index'))->with('success','تم الاضافه بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('dahsboard.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $rules = [
    'name' => 'required',
    'password' => 'required|confirmed',
    'email' => 'required|email',
    'roles_list' => 'required'
];

$messages = [
    'name.required' => 'الاسم مطلوب',
    'password.required' => 'كلمة السر مطلوبة',
    'password.confirmed' => 'كلمة السر ليست متطابقة',
    'email.required' => 'الإيميل مطلوب',
    'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
    'roles_list.required' => 'الرتب مطلوبة'
];

$this->validate($request, $rules, $messages);

        
        $user=User::findOrFail($id);
        $user->roles()->sync($request->input('roles_list'));
        $request->merge(['password'=>bcrypt($request->password)]);
        $user->update($request->all());
         return redirect(route('users.index'))->with('success','تم التحديث بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return back();
    }
}
