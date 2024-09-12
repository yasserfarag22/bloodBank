<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminControler extends Controller
{
  public function index(){
       
    $citiesCount = City::count();
    $governoratesCount = Governorate::count();
    $categoriesCount = Category::count();
    $postsCount = Post::count();
    $settingCount=Setting::count();
    $contactsCount=Contact::count();
    $donationsCount=DonationRequest::count();
    $clientsCount=Client::count();
    return view('dahsboard.index',compact('citiesCount','governoratesCount','categoriesCount','postsCount','settingCount','contactsCount','donationsCount','clientsCount'));

      

  }
}
