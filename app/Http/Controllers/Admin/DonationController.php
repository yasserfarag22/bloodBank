<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(){
        $donationRequests=DonationRequest::paginate(20);
        return view('dahsboard.donations.index',compact('donationRequests'));
    }
}
