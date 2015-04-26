<?php

class CandidateExpLocation extends Eloquent 
{
	protected $table = 'can_exp_locations';
	
	/***
	 * Get locations relate to a cv id.
	*/
	public static function getExpLocations($cv_id)
	{
		// Get this table name.
		$tbl_this = with(new static)->getTable();
		$tbl_location = (new \Location)->getTable();
	
		return CandidateExpLocation::select(DB::raw(
											"cv_id,
											location_id,
											(SELECT name FROM {$tbl_location} WHERE id = {$tbl_this}.location_id LIMIT 1) location_name"
									))->where('cv_id', '=', $cv_id)
									->get();
	}
	
	/***
	 * Get the location of candidate expectation.
	 */
	public function getExpLocation()
	{
		// Get constant location table name.
		$tbl_location= (new \Location)->getTable();
		
		return CandidateExpLocation::select(DB::raw(
											"cv_id,
											location_id,
											(SELECT name FROM {$tbl_location} WHERE id = {$this->table}.location_id LIMIT 1) location_name
											"
									))
									->where('cv_id', '=', $this->cv_id)
									->where('location_id', '=', $this->location_id)
									->first();
	}
}