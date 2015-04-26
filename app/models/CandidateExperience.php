<?php

class CandidateExperience extends Eloquent 
{
	protected $table = 'can_experiences';
	
	public static function getExperience($cv_id)
	{
		$tbl_this = with(new static)->getTable();
		$tbl_industry = (new \Industry)->getTable();
		$tbl_function = (new \Func)->getTable();
		$tbl_location = (new \Location)->getTable();
		
		return \CandidateExperience::select(DB::raw(
								"id,
								cv_id,
								job_title,
								company_name,
								industry_id,
								(SELECT name FROM {$tbl_industry} WHERE id = {$tbl_this}.industry_id LIMIT 1) industry,
								function_id,
								(SELECT name FROM {$tbl_function} WHERE id = {$tbl_this}.function_id LIMIT 1) function,
								industry_id,
								function_id,
								location,
								job_description,
								from_month,
								from_year,
								to_month,
								to_year"
							))
							->where('cv_id', '=', $cv_id)
							->get();
	}
}