<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'city_id', 'hospital_name', 'blood_type_id', 'age', 'bags', 'hospital_location', 'details', 'latitude', 'longitude');

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

}