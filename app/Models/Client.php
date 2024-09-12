<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasApiTokens, HasFactory;

    protected $table = 'clients';
    public $timestamps = true;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'phone', 
        'blood_type_id', 
        'date_of_birth', 
        'last_donation_date', 
        'city_id',    
        'pin_code',    
    ];

 
    protected $hidden = [
        'password',
    ];

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function bloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }
}
