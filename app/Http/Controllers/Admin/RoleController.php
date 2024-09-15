<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(20);
        return view('dahsboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('dahsboard.roles.add', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'display_name' => 'required|string',
            'permissions_list' => 'required|array'
        ];
        $messages = [
            'name.required' => 'اسم الرتبة مطلوب',
            'name.string' => 'اسم الرتبة يجب أن يكون نصيًا',
            'name.max' => 'اسم الرتبة يجب ألا يتجاوز 255 حرفًا',
            'display_name.required' => 'الاسم المعروض مطلوب',
            'permissions_list.required' => 'يجب اختيار الصلاحيات',
            'permissions_list.array' => 'الصلاحيات يجب أن تكون مصفوفة'
        ];
        $this->validate($request, $rules, $messages);

        $role = Role::create($request->all());

        $role->permissions()->attach($request->permissions_list);

        return redirect(route('roles.index'))->with('success', 'تــمت الاضــافة بنجــاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions=$role->permissions->pluck('id')->toArray();
        return view('dahsboard.roles.edit', compact('role', 'permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $rules = [
            'name' => 'required|string|max:255',
            'display_name' => 'required|string',
            'permissions_list' => 'required|array'
        ];
        $messages = [
            'name.required' => 'اسم الرتبة مطلوب',
            'name.string' => 'اسم الرتبة يجب أن يكون نصيًا',
            'name.max' => 'اسم الرتبة يجب ألا يتجاوز 255 حرفًا',
            'display_name.required' => 'الاسم المعروض مطلوب',
            'permissions_list.required' => 'يجب اختيار الصلاحيات',
            'permissions_list.array' => 'الصلاحيات يجب أن تكون مصفوفة'
        ];
        $this->validate($request, $rules, $messages);

        $role = Role::findOrFail($id);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions_list);

        return redirect(route('roles.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect(route('roles.index'))->with('success', 'تم الحذف بنجاح');
    }
}
