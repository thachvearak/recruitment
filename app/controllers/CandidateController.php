<?php

class CandidateController extends BaseController 
{
	protected $candidate_id;
	protected $candidate;
	protected $cv;
	protected $industries;
	protected $functions;
	protected $locations;
	protected $rules;

	public function __construct() {
		$this->candidate_id = Auth::user()->id;
		$this->industries = Industry::get ();
		$this->functions = Func::get ();
		$this->locations = Location::get ();	
		
		$this->rules = array(
			'surname'					=> 'required',
			'name'						=> 'required',
			'sex'						=> 'required',
			'date_of_birth'				=> 'required',
			'marital_status'			=> 'required',
			'nationality'				=> 'required',
			'phone_number'				=> 'required',
			'residence'					=> 'required',
			'address'					=> 'required',
			'desired_industry'			=> 'required',
			'desired_function'			=> 'required',
			'desired_location'			=> 'required',
			'desired_salary'			=> 'required',
		);
		
		if(!$this->candidate = \Candidate::getProfile($this->candidate_id))
		{
			$candidate = [
				'surname' 			=> '',
				'name' 				=> '',
				'sex' 				=> 'Unknown',
				'date_of_birth' 	=> '',
				'marital_id' 		=> 'Unknown',
				'nationality_id'	=> '',
				'nationality' 		=> '',
				'phone_number' 		=> '',
				'residence_id'		=> '',
				'residence' 		=> '',
				'address' 			=> '',
				'is_new_candidate'		=> true
			];
		
			$this->candidate = json_decode(json_encode($candidate));
		}
	}

	public function index() {
		return View::make ( 'candidate' );
	}

	public function getProfile()
	{					
		return View::make ( 'candidate.profile' )->with('candidate', $this->candidate);
	}
	
	public function postProfile()
	{
		$validator = Validator::make ( Input::all (), [
			'surname'					=> 'required',
			'name'						=> 'required',
			'sex'						=> 'required',
			'date_of_birth'				=> 'required',
			'marital_status'			=> 'required',
			'nationality'				=> 'required',
			'phone_number'				=> 'required',
			'residence'					=> 'required',
			'address'					=> 'required',			
		],
		[
			'required' => 'Field required.'
		]);
		
		if ($validator->fails ()) {
			return Redirect::back()->withErrors($validator)
									->withInput();
		} else {		
			
			if(!$candidate = Candidate::find($this->candidate_id))
			{
				$candidate = new Candidate ();
			}		
			
			$candidate->surname = htmlentities ( Input::get ( 'surname' ) );
			$candidate->name = htmlentities ( Input::get ( 'name' ) );
			$candidate->sex = htmlentities ( Input::get ( 'sex' ) );
			$candidate->date_of_birth = date ( 'Y-m-d', strtotime ( htmlentities ( Input::get ( 'date_of_birth' ) ) ) );
			$candidate->marital_id = htmlentities ( Input::get ( 'marital_status' ) );
			$candidate->nationality_id = htmlentities ( Input::get ( 'nationality' ) );
			$candidate->phone_number = htmlentities ( Input::get ( 'phone_number' ) );
			$candidate->residence_id = htmlentities ( Input::get ( 'residence' ) );
			$candidate->address = htmlentities ( Input::get ( 'address' ) );
			$candidate->email = Auth::user()->email;
			
			if ($candidate->save ()) {
				return Redirect::back()->with('profile' , 'Profile saved successfully.');
			}
		}
	}

	public function getCVCreate() {
		return View::make ( 'candidate.candidate-create' )->with('candidate', $this->candidate);
	}

	public function postCVCreate() {
		$validator = Validator::make ( Input::all (), $this->rules );
		
		if ($validator->fails ()) {
			return Redirect::back()->withErrors($validator);
		} else {
			
			$candidate->id = Auth::user ()->id;
			$candidate->surname = htmlentities ( Input::get ( 'surname' ) );
			$candidate->name = htmlentities ( Input::get ( 'name' ) );
			$candidate->sex = htmlentities ( Input::get ( 'sex' ) );
			$candidate->date_of_birth = date ( 'Y-m-d', strtotime ( htmlentities ( Input::get ( 'date_of_birth' ) ) ) );
			$candidate->marital_status = htmlentities ( Input::get ( 'marital-status' ) );
			$candidate->nationality = htmlentities ( Input::get ( 'nationality' ) );
			$candidate->phone_number = htmlentities ( Input::get ( 'phone_number' ) );
			$candidate->email = htmlentities ( Input::get ( 'email' ) );
			$candidate->residence = htmlentities ( Input::get ( 'residence' ) );
			$candidate->address = htmlentities ( Input::get ( 'address' ) );
			$candidate->desired_industry = htmlentities ( Input::get ( 'desired_industry' ) );
			$candidate->desired_function = htmlentities ( Input::get ( 'desired_function' ) );
			$candidate->desired_location = htmlentities ( Input::get ( 'desired_location' ) );
			$candidate->desired_salary = htmlentities ( Input::get ( 'desired_salary' ) );
			$candidate->desired_position = htmlentities ( Input::get ( 'desired_position' ) );
			$candidate->available_date = date ( 'Y-m-d', strtotime ( htmlentities ( Input::get ( 'available_date' ) ) ) );
			
			if ($candidate->save ()) {
				return 'Sucessfull create CV.';
			}
		}
	}
	
	public function getCVEdit($cv_id)
	{
		$cv =  CV::getCVDetail($cv_id);		
		$edu = $cv->education();
		$experiences = $cv->workExperience();
		$skills = $cv->skills();
		$languages = $cv->languages();	
		$expectations = $cv->expectation();
		
		$candidate = json_decode(json_encode($this->candidate), true);		
		$candidate['cv'] = json_decode(json_encode($cv), true);
		$candidate['cv']['education'] = json_decode(json_encode($edu), true);
		$candidate['cv']['work_experiences'] = json_decode(json_encode($experiences), true);
		$candidate['cv']['skills'] = json_decode(json_encode($skills), true);
		$candidate['cv']['languages'] = json_decode(json_encode($languages), true);
		$candidate['cv']['expectation'] = $expectations;	
		
		if(strtolower(\Input::get('data')) == 'json'){
			return $candidate['cv'];
		}
		else{
			return View::make('candidate.cv-edit')->with([
				'candidate'	=>	json_decode(json_encode($candidate))
			]);
		}		
	}
	
	public function postCVEdit($cv_id)
	{			
		
		$this->postEducation($cv_id);
		$this->postWorkExperience($cv_id);
		$this->postSkill($cv_id);		
		
		return \Redirect::back();
	}
	
	public function getCVs()
	{
		$cvs = CV::getCVList($this->candidate_id);
		
		return View::make('candidate.cvs')->with('cvs', $cvs);
	}
	
	private function postSkill($cv_id)
	{
		// Edit skill.
		$skill_ids = \Input::get('skill_id');
		$skill_name = \Input::get('skill_name');
		$skill_level = \Input::get('skill_level');
		$year_experience = \Input::get('year_experience');
		
		$db_skills = \CandidateSkill::select('id')->where('cv_id', '=', $cv_id)->get();
		
		foreach($db_skills as $db_skill)
		{
			if(in_array($db_skill->id, $skill_ids))
			{
				$key = array_search($db_skill->id, $skill_ids);
		
				$db_skill->name = $skill_name[$key];
				$db_skill->level_id = $skill_level[$key];
				$db_skill->y_experience = $year_experience[$key];
		
				$db_skill->save();
			}
			else
			{
				$db_skill->delete();
			}
		}
		
	}
	
	private function postWorkExperience($cv_id)
	{
		// Edit work experience.
		$ex_ids = \Input::get('ex_id');
		$ex_job_titles = \Input::get('ex_job_title');
		$ex_company_names = \Input::get('ex_company_name');
		$ex_industries = \Input::get('ex_industry');
		$ex_locations = \Input::get('ex_location');
		$ex_from_dates = \Input::get('ex_from_date');
		$ex_to_dates = \Input::get('ex_to_date');
		
		$db_exs = \CandidateExperience::select('id')->where('cv_id', '=', $cv_id)->get();
		
		foreach($db_exs as $db_ex)
		{
			if(in_array($db_ex->id, $ex_ids))
			{
				$key = array_search($db_ex->id, $ex_ids);
				
				$db_ex->company_name = $ex_company_names[$key];				
				$db_ex->job_title = $ex_job_titles[$key];				
				$db_ex->industry_id = $ex_industries[$key];				
				$db_ex->location_id = $ex_locations[$key];				
				$db_ex->from_date = $ex_from_dates[$key];				
				$db_ex->to_date = $ex_to_dates[$key];				
				
				$db_ex->save();
			}
			else 
			{
				$db_ex->delete();
			}
		}
		
		// Add new experience.
		$new_ex_job_titles = \Input::get('ex_job_title_new');
		$new_ex_company_names = \Input::get('ex_company_name_new');
		$new_ex_industries = \Input::get('ex_industry_new');
		$new_ex_locations = \Input::get('ex_location_new');
		$new_ex_from_dates = \Input::get('ex_from_date_new');
		$new_ex_to_dates = \Input::get('ex_to_date_new');
		$total_new = count($new_ex_job_titles);
		
		for ($i=0; $i<$total_new; $i++)
		{
			if(empty(trim($new_ex_job_titles[$i]))) continue;
			
			$new_experience = new \CandidateExperience();
			
			$new_experience->cv_id = $cv_id;
			$new_experience->company_name = $new_ex_company_names[$i];
			$new_experience->job_title = $new_ex_job_titles[$i];
			$new_experience->industry_id = $new_ex_industries[$i];
			$new_experience->location_id = $new_ex_locations[$i];
			$new_experience->from_date = $new_ex_from_dates[$i];
			$new_experience->to_date = $new_ex_to_dates[$i];
			
			$new_experience->save();
		}
	}
	
	private function postEducation($cv_id)
	{	
		// Edit education.
		$edu_ids = \Input::get('education_id');
		$institutes = \Input::get('institute');
		$majors = \Input::get('major');
		$degrees = \Input::get('degree');
		$situations = \Input::get('situation');
		$grad_year = \Input::get('graduation_year');
		
		$db_edus = \CandidateEducation::select('id')->where('cv_id', '=', $cv_id)->get();
		
		foreach($db_edus as $db_edu)
		{
			if(in_array($db_edu->id, $edu_ids))
			{
				$key = array_search($db_edu->id, $edu_ids);
		
				$db_edu->institute = $institutes[$key];
				$db_edu->major = $majors[$key];
				$db_edu->degree_id = $degrees[$key];
				$db_edu->situation_id = $situations[$key];
				$db_edu->graduation_date = (empty(trim($grad_year[$key])) ? null : $grad_year[$key] );
		
				$db_edu->save();
			}
			else
			{
				$db_edu->delete();
			}
		}
		
		
		// Insert new educations.
		$new_institutes = \Input::get('institute_new');
		$new_majors = \Input::get('major_new');
		$new_degrees = \Input::get('degree_new');
		$new_situations = \Input::get('situation_new');
		$new_grad_year = \Input::get('graduation_year_new');
		$total_new_edu = count($new_institutes);
				
		for ($i=0; $i<$total_new_edu; $i++)
		{
			if(empty(trim($new_institutes[$i]))) continue;
				
			$new_edu = new \CandidateEducation();
				
			$new_edu->cv_id = $cv_id;
			$new_edu->institute = $new_institutes[$i];
			$new_edu->major = $new_majors[$i];
			$new_edu->degree_id = $new_degrees[$i];
			$new_edu->situation_id = $new_situations[$i];
			$new_edu->graduation_date = (empty(trim($new_grad_year[$i])) ? null : $grad_year[$key] );
				
			$new_edu->save();
		}
	}
	
	/***
	 * Edit CV summary.
	 */
	public function editCVSummary($id)
	{		
		if($cv = \CV::find($id))
		{
			$summary = \Input::get('summary');		
			
			$cv->summary = !empty($summary) ? $summary : null;
			$cv->save();
			
			return ['summary' => \Input::get('summary')];
		}
		else 
		{
			\App::abort('403', 'There\'s some wrong. Cannot update CV.');
		}
				
	}

	/***
	 * Add a new candidate experience.
	 */
	public function createCVExperience($cv_id)
	{
		// Initialize a new experience model object.
		$can_experience = new \CandidateExperience;
		
		// Assign each inputs' value to variable.
		$job_title = htmlentities(\Input::get('job_title'));
		$company_name = htmlentities(\Input::get('company_name'));
		$location = htmlentities(\Input::get('location'));
		$job_description = htmlentities(\Input::get('job_description'));
		$from_month = htmlentities(\Input::get('from_month'));
		$from_year = htmlentities(\Input::get('from_year'));
		$to_month = htmlentities(\Input::get('to_month'));
		$to_year = htmlentities(\Input::get('to_year'));
		
		// Assign value to new experience.
		$can_experience->cv_id = $cv_id;
		$can_experience->job_title = !empty($job_title) ? $job_title : null;
		$can_experience->company_name = !empty($company_name) ? $company_name : null;
		$can_experience->location = !empty($location) ? $location : null;
		$can_experience->job_description = !empty($job_description) ? $job_description : null;
		$can_experience->from_month = !empty($from_month) ? $from_month : null;
		$can_experience->from_year = !empty($from_year) ? $from_year : null;
		$can_experience->to_month = !empty($to_month) ? $to_month : null;
		$can_experience->to_year = !empty($to_year) ? $to_year : null;
		
		// Save a new experience.
		if(!$can_experience->save())
		{
			\App::abort('403', 'There\'s some wrong. Cannot add a new experience.');
		}
		
		return $can_experience;
	}
	
	/***
	 * Update a candidate experience.
	 */
	public function editCVExperience($cv_id, $id)
	{		
		if($can_experience = \CandidateExperience::where('id', '=', $id)
								->where('cv_id', '=', $cv_id)
								->first())
		{			
			$job_title = htmlentities(\Input::get('job_title'));
			$company_name = htmlentities(\Input::get('company_name'));
			$location = htmlentities(\Input::get('location'));
			$job_description = htmlentities(\Input::get('job_description'));
			$from_month = htmlentities(\Input::get('from_month'));
			$from_year = htmlentities(\Input::get('from_year'));
			$to_month = htmlentities(\Input::get('to_month'));
			$to_year = htmlentities(\Input::get('to_year'));
			
			$can_experience->job_title = !empty($job_title) ? $job_title : null;
			$can_experience->company_name = !empty($company_name) ? $company_name : null;
			$can_experience->location = !empty($location) ? $location : null;
			$can_experience->job_description = !empty($job_description) ? $job_description : null;
			$can_experience->from_month = !empty($from_month) ? $from_month : null;
			$can_experience->from_year = !empty($from_year) ? $from_year : null;
			$can_experience->to_month = !empty($to_month) ? $to_month : null;
			$can_experience->to_year = !empty($to_year) ? $to_year : null;
			$can_experience->save();
				
			return $can_experience;
		}
		else
		{
			\App::abort('403', 'There\'s some wrong. Cannot update CV.');
		}
	}
	
	/***
	 * Delete a candidate experience.
	 */
	public function deleteCVExperience($cv_id, $id)
	{
		// Check if record exist.
		if(!$can_experience = \CandidateExperience::where('id', '=', $id)
							->where('cv_id', '=', $cv_id)
							->first())
		{
			\App::abort('403', 'There\'s some wrong. Cannot delete CV.');
		}
		
		// Delete record.
		$can_experience->delete();
	}
	
	/***
	 * Add a new candidate education background.
	 */
	public function createCVEdu($cv_id)
	{
		$can_edu = new \CandidateEducation;
		
		$institute = \Input::get('institute');
		$major = \Input::get('major');
		$degree_id = \Input::get('degree_id');
		$situation_id = \Input::get('situation_id');
		$from_year = \Input::get('from_year');
		$grad_year = \Input::get('grad_year');
		
		$can_edu->cv_id = $cv_id;
		$can_edu->institute = !empty($institute) ? $institute : null;
		$can_edu->major 	= !empty($major) ? $major : null;
		$can_edu->degree_id = !empty($degree_id) ? $degree_id : null;
		$can_edu->situation_id = !empty($situation_id) ? $situation_id : null;
		$can_edu->from_year = !empty($from_year) ? $from_year : null;
		$can_edu->grad_year = !empty($grad_year) ? $grad_year : null;
		
		if(!$can_edu->save())
		{
			\App::abort('403', 'There\'s some wrong. Cannot create this new education.');
		}
		
		return $can_edu->getEducation();
	}
	
	/***
	 * Update a candidate education background.
	 */
	public function editCVEdu($cv_id, $id)
	{
		if($can_edu = \CandidateEducation::where('id', '=', $id)
								->where('cv_id', '=', $cv_id)
								->first())
		{
			try
			{
				$institute = \Input::get('institute');
				$major = \Input::get('major');
				$degree_id = \Input::get('degree_id');
				$situation_id = \Input::get('situation_id');
				$from_year = \Input::get('from_year');
				$grad_year = \Input::get('grad_year');				
				
				$can_edu->institute = !empty($institute) ? $institute : null;
				$can_edu->major 	= !empty($major) ? $major : null;
				$can_edu->degree_id = !empty($degree_id) ? $degree_id : null;
				$can_edu->situation_id = !empty($situation_id) ? $situation_id : null;
				$can_edu->from_year = !empty($from_year) ? $from_year : null;
				$can_edu->grad_year = !empty($grad_year) ? $grad_year : null;
				$can_edu->save();
			}
			catch (\PDOException $e)
			{
				App::abort(403, 'Not authenticated');
			}
		
			return $can_edu->getEducation();
		}
		else
		{
			\App::abort('403', 'There\'s some wrong. Cannot update this education.');
		}
	}
	
	/***
	 * Delete a candidate education background.
	 */
	public function deleteCVEdu($cv_id, $id)
	{				
		// Check if record exist.
		if(!$can_edu = \CandidateEducation::where('id', '=', $id)
							->where('cv_id', '=', $cv_id)
							->first())
		{
			\App::abort('403', 'There\'s some wrong. Cannot delete this education.');
		}
		
		// Delete record.
		$can_edu->delete();
	}
	
	/***
	 * Create new CV skill.
	*/
	public function createCVSkill($cv_id)
	{
		$can_skill = new \CandidateSkill;
	
		$name 				= \Input::get('name');
		$level_id 			= \Input::get('level_id');
		$year_experience 	= \Input::get('year_experience');
		
		try
		{
			$can_skill->cv_id 			= $cv_id;
			$can_skill->name 			= !empty($name) ? $name : null;
			$can_skill->level_id 		= !empty($level_id) ? $level_id : null;
			$can_skill->year_experience = !empty($year_experience) ? $year_experience : null;			
			$can_skill->save();
		}
		catch (\PDOException $e)
		{
			App::abort(403, 'Not authenticated');
		}
		
		return $can_skill->getSkill();
	}
	
	/***
	 * Delete CV skill.
	 */
	public function deleteCVSkill($cv_id, $id)
	{
		// Check if record exist.
		if(!$can_skill = \CandidateSkill::where('id', '=', $id)
						->where('cv_id', '=', $cv_id)
						->first())
		{
			\App::abort('403', 'There\'s some wrong. Cannot delete this skill.');
		}
		
		// Delete record.
		$can_skill->delete();
	}
	
	public function editCVSkill($cv_id)
	{
		$skills = \Input::get('skills');

		foreach ($skills as $skill) 
		{
			switch ($skill['status']) {
				case 3: // Delete skill
					$can_skill = \CandidateSkill::where('id', '=', $skill['id'])
												->where('cv_id', '=', $cv_id)
												->first();

					if($can_skill) $can_skill->delete();
					else \App::abort('403', 'There\'s some wrong. Cannot delete skill(s).');

					break;
				case 1: // Add new skill
					$can_skill = new \CandidateSkill;

					$can_skill->cv_id = $cv_id;
					$can_skill->name = $skill['name'];
					$can_skill->level_id = $skill['level'];
					$can_skill->year_experience = $skill['year_exp'];

					if($can_skill) $can_skill->save();
					else \App::abort('403', 'There\'s some wrong. Cannot add new skill(s).');

					break;
			}
		}

		$can_skills = \CandidateSkill::getSkills($cv_id);
		
		return $can_skills;
	}
	
	/***
	 * Create new CV language.
	 */
	public function createCVLang($cv_id)
	{
		// Initialize a new language object.
		$can_language = new \CandidateLanguage;
		
		// Get input values.
		$language	= \Input::get('language');
		$proficiency_id	= \Input::get('proficiency_id');
		
		try
		{			
			// Assign the new language properties' value.
			$can_language->cv_id 			= $cv_id;
			$can_language->language			= !empty($language) ? $language : null;
			$can_language->proficiency_id	= !empty($proficiency_id) ? $proficiency_id : null;
			
			// Insert into the database.
			$can_language->save();
		}
		catch (\PDOException $e)
		{
			App::abort(403, 'Not authenticated');
		}
		
		// Return the new saved-language detail.
		return $can_language->getLanguage();
	}
	
	/***
	 * Delete language.
	 */
	public function deleteCVLang($cv_id, $id)
	{
		// Check if record exist.
		if(!$can_language = \CandidateLanguage::where('id', '=', $id)
											->where('cv_id', '=', $cv_id)
											->first())
		{
			\App::abort('403', 'There\'s some wrong. Cannot delete this languague.');
		}
		
		// Delete record.
		$can_language->delete();
	}

	public function editCVLang($cv_id)
	{
		$langs = \Input::get('language');

		foreach ($langs as $lang) 
		{
			switch ($lang['status']) {				
				case 1: // Add new language
					$can_lang = new \CandidateLanguage;

					$can_lang->cv_id = $cv_id;
					$can_lang->language = $lang['name'];
					$can_lang->proficiency_id = $lang['proficiency'];

					if($can_lang) $can_lang->save();
					else \App::abort('403', 'There\'s some wrong. Cannot add new language(s).');

					break;

				case 2: // Update languages
					$can_lang = \CandidateLanguage::where('id', '=', $lang['id'])
												->where('cv_id', '=', $cv_id)
												->first();
					if($can_lang){
						$can_lang->language = $lang['name'];
						$can_lang->proficiency_id = $lang['proficiency'];

						$can_lang->save();
					}
					else {
						\App::abort('403', 'There\'s some wrong. Cannot update language(s).');
					}

					break;

				case 3: // Delete language
					$can_lang = \CandidateLanguage::where('id', '=', $lang['id'])
												->where('cv_id', '=', $cv_id)
												->first();

					if($can_lang) $can_lang->delete();
					else \App::abort('403', 'There\'s some wrong. Cannot delete language(s).');

					break;
			}
		}

		$can_langs = \CandidateLanguage::getLanguages($cv_id);
		
		return $can_langs;
	}
	
	/***
	 * Add new candidate function.
	 */
	public function createFunction($cv_id)
	{
		// Initialize a new function object.
		$can_func = new \CandidateExpFunction;
		
		// Get input values.
		$function_id	= \Input::get('function_id');
		
		try
		{
			// Assign the new language properties' value.
			$can_func->cv_id 		= $cv_id;
			$can_func->function_id	= $function_id;
				
			// Insert into the database.
			$can_func->save();
		}
		catch (\PDOException $e)
		{		
			switch ($e->getCode())
			{
				case 23000:
					App::abort(403, 'This function already added.');
					break;
					
				default:
					App::abort(403, 'Not authenticated');
					break;
			}
		}
		
		return $can_func->getExpFunction();
	}
		
	/***
	 * Delete candidate expectation function.
	 */
	public function deleteFunction($cv_id, $function_id)
	{
		try 
		{
			// Find expectation function base on cv_id and function_id.
			$can_func = \CandidateExpFunction::where('cv_id', '=', $cv_id)
											->where('function_id', '=', $function_id);
			
			// Check if deleting function fail.
			if(!$can_func->delete())
			{
				App::abort(403, 'This function doesn\'t exist or may already deleted.');
			}
		}
		catch (\PDOException $e)
		{
			switch ($e->getCode())
			{
				default:
					App::abort(403, 'Not authenticated');
					break;
			}
		}
		
	}
	
	/***
	 * Add new expectation industry.
	 */
	public function createIndustry($cv_id)
	{
		// Initialize a new industry object
		$can_industry = new \CandidateExpIndustry;
		
		try 
		{
			// Assign the new expectation industry properties' values.
			$can_industry->cv_id = $cv_id;
			$can_industry->industry_id = \Input::get('industry_id');
			
			// Insert into the database.
			$can_industry->save();
		}
		catch (\PDOException $e)
		{
			switch ($e->getCode())
			{
				case 23000:
					App::abort(403, 'This industry already added.');
					break;
					
				default:
					App::abort(403, 'Not authenticated');
					break;
			}
		}
		
		return $can_industry->getExpIndustry();
	}
	
	/***
	 * Delete candidate expectation function.
	*/
	public function deleteIndustry($cv_id, $industry_id)
	{
		try
		{
			// Find expectation industry base on cv_id and industry_id.
			$can_industry = \CandidateExpIndustry::where('cv_id', '=', $cv_id)
												->where('industry_id', '=', $industry_id);
				
			// Check if deleting industry fail.
			if(!$can_industry->delete())
			{
				App::abort(403, 'This industry doesn\'t exist or may already deleted.');
			}
		}
		catch (\PDOException $e)
		{
			switch ($e->getCode())
			{
				default:
					App::abort(403, 'Not authenticated');
					break;
			}
		}
	
	}
	
	/***
	 * Add new expectation location.
	 */
	public function createLocation($cv_id)
	{
		// Initialize a new location object
		$can_location = new \CandidateExpLocation;
		
		try
		{
			// Assign the new expectation location properties' values.
			$can_location->cv_id = $cv_id;
			$can_location->location_id = \Input::get('location_id');
				
			// Insert into the database.
			$can_location->save();
		}
		catch (\PDOException $e)
		{
			switch ($e->getCode())
			{
				case 23000:
					App::abort(403, 'This location already added.');
					break;
						
				default:
					App::abort(403, 'Not authenticated');
					break;
			}
		}
		
		return $can_location->getExpLocation();
	}
	
	/***
	 * Delete candidate expectation location.
	 */
	public function deleteLocation($cv_id, $location_id)
	{
		try
		{
			// Find expectation location base on cv_id and location_id.
			$can_location = \CandidateExpLocation::where('cv_id', '=', $cv_id)
												->where('location_id', '=', $location_id);
	
			// Check if deleting location fail.
			if(!$can_location->delete())
			{
				App::abort(403, 'This location doesn\'t exist or may already deleted.');
			}
		}
		catch (\PDOException $e)
		{
			switch ($e->getCode())
			{
				default:
					App::abort(403, 'Not authenticated');
					break;
			}
		}
	
	}

	/***
	 * Edit candidate expected salary.
     */
	public function editSalary($cv_id)
	{
		if($cv = \CV::find($cv_id))
		{
			$salary_range = \Input::get('salary_range');		
			
			$cv->salary_range = !empty($salary_range) ? $salary_range : null;
			$cv->save();	
		}
		else 
		{
			\App::abort('403', 'Cannot update expected salary.');
		}

		return ['salary_range' => \Input::get('salary_range')];
	}
	
	/***
	 * Add a new expected job term.
	 */
	public function createJobTerm($cv_id)
	{
		// Initialize a new job term object
		$can_job_term = new \CandidateExpJobTerm();
		
		try
		{
			// Assign the new expectation location properties' values.
			$can_job_term->cv_id = $cv_id;
			$can_job_term->term_id = null;
		
			// Insert into the database.
			$can_job_term->save();
		}
		catch (\PDOException $e)
		{
			switch ($e->getCode())
			{
				case 23000:
					//App::abort(403, 'This job term already added.');
					App::abort(403, $e->getMessage());
					break;
		
				default:
					App::abort(403, 'Not authenticated');
					break;
			}
		}
		
		return $can_job_term->getExpJobTerm();
	}
	
	/***
	 * Delete candidate expectation job term.
	*/
	public function deleteJobTerm($cv_id, $term_id)
	{
		try
		{
			// Find expectation job term base on cv_id and term_id.
			$can_job_term = \CandidateExpJobTerm::where('cv_id', '=', $cv_id)
												->where('term_id', '=', $term_id);
	
			// Check if deleting job term fail.
			if(!$can_job_term->delete())
			{
				App::abort(403, 'This job term doesn\'t exist or may already deleted.');
			}
		}
		catch (\PDOException $e)
		{
			switch ($e->getCode())
			{
				default:
					App::abort(403, 'Not authenticated');
					break;
			}
		}
	
	}
}