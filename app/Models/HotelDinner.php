<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelDinner extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'hotel_id', 'title', 'price',
	];

	public function hotel()
   	{
    	return $this->belongsTo('App\Models\Hotel');
   	}
}
