<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'name',
	];

    public function roomtypes()
    {
        return $this->hasMany('App\Models\HotelRoomType');
    }

    public function rooms()
    {
    	return $this->hasMany('App\Models\HotelRoom');	
    }

    public function dinner()
    {
    	return $this->hasMany('App\Models\HotelDinner');		
    }
}
