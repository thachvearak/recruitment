<?php

class CandidateExpIndustry extends Eloquent 
{
	protected $table = 'can_exp_industries';
	
	/***
	 * Get industries relate to a cv id.
	 */
	public static function getExpIndustries($cv_id)
	{
		// Get this table name.
		$tbl_this = with(new static)->getTable();
		$tbl_industry = (new \Industry)->getTable();
		
		return CandidateExpIndustry::select(DB::raw(
											"cv_id,
											industry_id,
											(SELECT name FROM {$tbl_industry} WHERE id = {$tbl_this}.industry_id LIMIT 1) industry_name"
									))->where('cv_id', '=', $cv_id)
									->get();
	}
	
	/***
	 * Get as single industry object detail.
	*/
	public function getExpIndustry()
	{
		// Get constant industry table name.
		$tbl_industry = (new \Industry)->getTable();
	
		return CandidateExpIndustry::select(DB::raw(
												"cv_id,
												industry_id,
												(SELECT name FROM {$tbl_industry} WHERE id = {$this->table}.industry_id LIMIT 1) industry_name
												"
											))
											->where('cv_id', '=', $this->cv_id)
											->where('industry_id', '=', $this->industry_id)
											->first();
	}
}