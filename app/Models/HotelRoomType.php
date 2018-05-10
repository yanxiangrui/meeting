<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoomType extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'hotel_id', 'title', 'bed_total', 'price', 'bed_price',
	];

	public function hotel()
   	{
    	return $this->belongsTo('App\Models\Hotel');
   	}
	
	public function rooms()
   	{
    	return $this->hasMany('App\Models\HotelRoom', 'hotel_room_type_id', 'id');
   	}	
}