<?php

class Func extends Eloquent 
{
	protected $table = 'constant_functions';
	protected $fillable = ['name', 'created_at', 'updated_at'];
	
	/***
	 * Get all active functions available.
	 */ 
	public static function getFunctions()
	{		
		return Func::select(['id', 'name'])
					->where('deleted', '=', 0)
					->get();
	}
}