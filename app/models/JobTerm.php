<?php

class JobTerm extends Eloquent 
{
	protected $table = 'constant_job_terms';
	
	/***
	 * Get all job term.
	 */
	public static function getJobTerms()
	{
		return JobTerm::select(['id', 'term'])
						->where('deleted', '=', 0)
						->get();
	}
}
