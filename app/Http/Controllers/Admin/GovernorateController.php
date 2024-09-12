<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $governorates=Governorate::paginate(20);
       return view('dahsboard.governorates.index',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dahsboard.governorates.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];
        $messages = [
            'name.required' => 'اسم المحافظه مطلوب',
            'name.string' => 'اسم المحافظه يجب أن يكون نصيًا',
            'name.max' => 'اسم المحافظه يجب ألا يتجاوز 255 حرفًا',
        ];
        $this->validate($request,$rules,$messages);
        $governorate=Governorate::create($request->all());
       
        return redirect(route('governorates.index'))->with('success','تــم اضــافة المحافظه بنجــاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $governorate=Governorate::findOrFail($id);
        return view('dahsboard.governorates.edit',compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];
        $messages = [
            'name.required' => 'اسم القسم مطلوب',
            'name.string' => 'اسم القسم يجب أن يكون نصيًا',
            'name.max' => 'اسم القسم يجب ألا يتجاوز 255 حرفًا',
        ];
        $this->validate($request,$rules,$messages);
        $governorate=Governorate::findOrFail($id);
        $governorate->update($request->all());
        return redirect(route('governorates.index'))->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $governorate=Governorate::findOrFail($id);
        $governorate->delete();
        return redirect(route('governorates.index'))->with('success','تم التعديل بنجاح');

    }
}
