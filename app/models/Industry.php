<?php

class Industry extends Eloquent 
{
	protected $table = 'constant_industries';
	protected $fillable = ['name', 'created_at', 'updated_at'];
	
	/***
	 * Get all actice industries available.
	 */
	public static function getIndustries()
	{
		return Industry::select(['id', 'name'])
						->where('deleted', '=', 0)
						->get();
	}
}
