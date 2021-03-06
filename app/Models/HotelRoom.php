<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'hotel_id', 'hotel_number', 'hotel_room_type_id',
	];

	public function hotel()
   	{
    	return $this->belongsTo('App\Models\Hotel');
   	}

   	public function roomtype()
   	{
    	return $this->belongsTo('App\Models\HotelRoomType', 'hotel_room_type_id');
   	}
}
