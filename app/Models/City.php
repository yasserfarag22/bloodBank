<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{
    protected $table = 'cities';
    public $timestamps = true;


    protected $fillable = ['governorate_id', 'name'];

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

   
    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }
}
