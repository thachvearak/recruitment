<?php

class CandidateExpJobTerm extends Eloquent 
{
	protected $table = 'can_exp_job_terms';
	

	/***
	 * Get all job term.
	*/
	public static function getExpJobTerms($cv_id)
	{
		// Get table name.
		$tbl_this = with(new static)->getTable();
		$tbl_jobterm = (new \JobTerm())->getTable();
		
		return CandidateExpJobTerm::select(DB::raw(
							"cv_id,
							term_id,
							(SELECT term FROM {$tbl_jobterm} WHERE id = {$tbl_this}.term_id LIMIT 1) term"
						))
						->where('cv_id', '=', $cv_id)
						->get();
	}
	
	/***
	 * Get a specific job term.
	 */
	public function getExpJobTerm()
	{
		// Get table name;
		$tbl_jobterm = (new \JobTerm())->getTable();
		
		return CandidateExpJobTerm::select(DB::raw(
										"cv_id,
										term_id,
										(SELECT term FROM {$tbl_jobterm} WHERE id = {$this->table}.term_id LIMIT 1) term"
								))
								->where('cv_id', '=', $this->cv_id)
								->where('term_id', '=', $this->term_id)
								->first();
	}
}