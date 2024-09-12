<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories=Category::paginate(20);
       return view('dahsboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dahsboard.categories.add');
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
            'name.required' => 'اسم القسم مطلوب',
            'name.string' => 'اسم القسم يجب أن يكون نصيًا',
            'name.max' => 'اسم القسم يجب ألا يتجاوز 255 حرفًا',
        ];
        $this->validate($request,$rules,$messages);
        $category=Category::create($request->all());
       
        return redirect(route('categories.index'))->with('success','تــم اضــافة القسم بنجــاح');
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
        $category=Category::findOrFail($id);
        return view('dahsboard.categories.edit',compact('category'));
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
        $category=Category::findOrFail($id);
        $category->update($request->all());
        return redirect(route('categories.index'))->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect(route('categories.index'))->with('success','تم التعديل بنجاح');

    }
}
