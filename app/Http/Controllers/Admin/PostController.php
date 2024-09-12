<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::get();
       $posts=Post::paginate(20);
       return view('dahsboard.posts.index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::get();
        return view('dahsboard.posts.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ];
    
        $messages = [
            'title.required' => 'اسم المقال مطلوب',
            'title.string' => 'اسم المقال يجب أن يكون نصيًا',
            'title.max' => 'اسم المقال يجب ألا يتجاوز 255 حرفًا',
            'content.required' => 'محتوى المقال مطلوب',
            'image.required' => 'صورة المقال مطلوبة',
            'image.image' => 'يجب أن يكون الملف صورة', 
            'image.mimes' => 'الصورة يجب أن تكون بإحدى الصيغ التالية: jpeg, png, jpg, gif, svg',
            'image.max' => 'حجم الصورة كبير جدًا (يجب ألا يتجاوز 2 ميجابايت)',
            'category_id.required' => 'يجب اختيار فئة للمقال',
            'category_id.exists' => 'الفئة المحددة غير موجودة',
        ];
    

        $this->validate($request, $rules, $messages);
    
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
    
      
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension(); 
            $image->move(public_path('img/posts'), $image_name); 
            $post->image = $image_name; 
        }
    
        $post->save();
    
   
        return redirect(route('posts.index'))->with('success', 'تم إضافة المقال بنجاح');
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
        $post=Post::findOrFail($id);
        $categories=Category::get();
        return view('dahsboard.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,avif,svg|max:2048', 
            'category_id' => 'required|exists:categories,id',
        ];
        
        $messages = [
            'title.required' => 'اسم المقال مطلوب',
            'title.string' => 'اسم المقال يجب أن يكون نصيًا',
            'title.max' => 'اسم المقال يجب ألا يتجاوز 255 حرفًا',
            'content.required' => 'محتوى المقال مطلوب',
            'image.image' => 'يجب أن يكون الملف صورة',
            'image.mimes' => 'الصورة يجب أن تكون بإحدى الصيغ التالية: jpeg, png, jpg, gif, svg',
            'image.max' => 'حجم الصورة كبير جدًا (يجب ألا يتجاوز 2 ميجابايت)',
            'category_id.required' => 'يجب اختيار فئة للمقال',
            'category_id.exists' => 'الفئة المحددة غير موجودة',
        ];
        
        $this->validate($request, $rules, $messages);
        
        $post = Post::findOrFail($id);
        
    
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
    
    
        if ($request->hasFile('image')) {
         
            if ($post->image) {
                Storage::delete('public/img/posts/' . $post->image);
            }
    
            
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/posts'), $image_name);
    
          
            $post->image = $image_name;
        }
        
        $post->save();
    
        return redirect(route('posts.index'))->with('success', 'تم التعديل بنجاح');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect(route('posts.index'))->with('success','تم التعديل بنجاح');

    }
}
