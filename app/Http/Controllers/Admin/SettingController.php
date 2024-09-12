<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $settings=Setting::get();
       return view('dahsboard.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
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
        $settings=Setting::findOrFail($id);
        return view('dahsboard.settings.edit',compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $rules = [
            'facebook_url'  => 'nullable|url',
            'twitter_url'   => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'google_url'    => 'nullable|url',
            'youtube_url'   => 'nullable|url',
        ];
        
   
        $request->validate($rules);
        
      
        $setting = Setting::firstOrNew([]);
    
     
        $setting->fill($request->all())->save();
   
        return redirect(route('settings.index'))->with('success', 'تم التعديل بنجاح');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
  

    }
}
