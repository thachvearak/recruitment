<?php

class CV extends Eloquent 
{
	protected $table = 'cv';
		
	public static function getCVList($candidate_id)
	{
		$cv_list = DB::table('cv')
					->select(
						'id',
						'title',
						'searchable',
						'updated_at'
					)
					->where('candidate_id', '=', $candidate_id)
					->get();
		
		return $cv_list;
	}
	
	public static function getCVDetail($cv_id)
	{
		$cv = CV::select(DB::raw(
					"id,
					title,
					searchable,
					summary,
					salary_range,
					reference,
					available_datetime"
				))
				->where('id', '=', $cv_id)
				->first();
		
		return $cv;
	}
	


	public function workExperience()
	{
		return \CandidateExperience::getExperience($this->id);
	}
	
	public function education()
	{
		return \CandidateEducation::getEducations($this->id);
	}
	
	public function skills()
	{
		return \CandidateSkill::getSkills($this->id);
	}
	
	public function languages()
	{
		return \CandidateLanguage::getLanguages($this->id);
	}
	
	public function expectation()
	{
		// Load expectation functions.
		$exp_functions = \CandidateExpFunction::getExpFunctions($this->id);
		
		// Load expectation industries.
		$exp_industries = \CandidateExpIndustry::getExpIndustries($this->id);
		
		// Load expectation location.
		$exp_locations = \CandidateExpLocation::getExpLocations($this->id);
		
		// Load expectation job term.
		$exp_job_terms = \CandidateExpJobTerm::getExpJobTerms($this->id);
		
		return [
			'functions'		=> json_decode(json_encode($exp_functions), true),
			'industries'	=> json_decode(json_encode($exp_industries), true),
			'locations'		=> json_decode(json_encode($exp_locations), true),
			'job_terms'		=> json_decode(json_encode($exp_job_terms), true)
		];
	}
}
