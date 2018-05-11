<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingJourney extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'meeting_id', 'name', 'description', 'price', 'start_time', 'end_time'
	];		

	protected $dates = [
		'created_at',
		'updated_at',
		'start_time',
		'end_time',	      
	];


	public function meeting()
   	{
    	return $this->belongsTo('App\Models\Meeting');
   	}
}
