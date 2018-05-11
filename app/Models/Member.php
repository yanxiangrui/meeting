<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'identity_key', 'name', 'sex', 'address', 'race'
	];	

	public function level()
	{	
		return $this->belongsTo('App\Models\MemberLevel');		
	}
}
