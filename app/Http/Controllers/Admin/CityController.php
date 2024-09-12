<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cities=City::paginate(20);
       return view('dahsboard.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorates=Governorate::get();
        return view('dahsboard.cities.add',compact('governorates'));
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
            'name.required' => 'اسم المدينه مطلوب',
            'name.string' => 'اسم المدينه يجب أن يكون نصيًا',
            'name.max' => 'اسم المدينه يجب ألا يتجاوز 255 حرفًا',
        ];
        $this->validate($request,$rules,$messages);
        $city=City::create($request->all());
       
        return redirect(route('cities.index'))->with('success','تــم اضــافة المدينه بنجــاح');
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
        $city=City::findOrFail($id);
        $governorates=Governorate::get();
        return view('dahsboard.cities.edit',compact('city','governorates'));
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
            'name.required' => 'اسم المدينه مطلوب',
            'name.string' => 'اسم المدينه يجب أن يكون نصيًا',
            'name.max' => 'اسم المدينه يجب ألا يتجاوز 255 حرفًا',
        ];
        $this->validate($request,$rules,$messages);
        $city=City::findOrFail($id);
        $city->update($request->all());
        return redirect(route('cities.index'))->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city=City::findOrFail($id);
        $city->delete();
        return redirect(route('cities.index'))->with('success','تم التعديل بنجاح');

    }
}
