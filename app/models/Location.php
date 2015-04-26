<?php

class Location extends Eloquent 
{
	protected $table = 'constant_locations';
	protected $fillable = ['name', 'type', 'created_at', 'updated_at'];
	
	/***
	 * Get all actice locations available.
	 */
	public static function getProvinces_Cities()
	{
		return Location::select(['id', 'name'])
						->where('code', '=', '100')
						->orWhere('code', '=', '200')
						->get();
	}
}
