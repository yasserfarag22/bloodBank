<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $contacts=Contact::get();
        return view('dahsboard.contacts.index',compact('contacts'));
    }
    public function delete($id){

        $contact=Contact::findOrFail($id);
        $contact->delete();
        return redirect(route('contacts.index'))->with('success', 'تم حذف الرسالة بنجاح');
    }
}
