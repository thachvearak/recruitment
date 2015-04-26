<?php

class Country extends Eloquent 
{
	protected $table = 'constant_countries';
	public $timestamps = false;

	public static function getNationalities()
	{
		return DB::table('countries')->select(['id', 'nationality'])
									->orderBy('nationality', 'asc')
									->get();
	}
}