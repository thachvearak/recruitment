<?php

class CandidateExpFunction extends Eloquent 
{
	protected $table = 'can_exp_functions';
	
	/***
	 * Get functions relate to a cv id.
	 */
	public static function getExpFunctions($cv_id)
	{
		// Get this table name.
		$tbl_this = with(new static)->getTable();
		$tbl_func = (new \Func)->getTable();
		
		return CandidateExpFunction::select(DB::raw(
										"cv_id,
										function_id,
										(SELECT name FROM {$tbl_func} WHERE id = {$tbl_this}.function_id LIMIT 1) function_name
										"
									))
									->where('cv_id', '=', $cv_id)
									->get();
	}
	
	/***
	 * Get as single function object detail.
	 */
	public function getExpFunction()
	{	
		// Get constant function table name.
		$tbl_func = (new \Func)->getTable();
		
		return CandidateExpFunction::select(DB::raw(
											"cv_id,
											function_id,
											(SELECT name FROM {$tbl_func} WHERE id = {$this->table}.function_id LIMIT 1) function_name
											"
									))
									->where('cv_id', '=', $this->cv_id)
									->where('function_id', '=', $this->function_id)
									->first();
	}
}