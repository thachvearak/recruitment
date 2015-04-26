<?php

use \Carbon\Carbon;

class EmployerController extends BaseController 
{
	public function index()
	{
		// Return back homepage if user is not an employer.
		if(Auth::user ()->user_type !== 1)
			return \Redirect::intended('/');
		
		// Open default page of employer.
		return \View::make('employer.employer');
	}
	
	public function getJobPost($emp_id)
	{
		// Return back homepage if user is not an employer.
		if(Auth::user ()->user_type !== 1)
			return \Redirect::intended('/');
		
		// Open job-post page.
		return \View::make('employer.job-post')->with('emp_id', $emp_id);
	}
	
	public function getJobList($emp_id)
	{
		// Return back homepage if user is not an employer.
		if(Auth::user ()->user_type !== 1)
			return \Redirect::intended('/');
		
		// Get employer's posted-jobs.
		$jobs = \Job::where('employer_id' , '=', $emp_id)->get();
		
		// Open job list page.
		return \View::make('employer.job-list')->with('jobs', $jobs);
	}
	
	public function postJobPost($emp_id)
	{
		// Get all the input data.
		$title = htmlentities(\Input::get('input-job-title'));
		$job_description = htmlentities(\Input::get('input-job-description'));
		$salary_range = htmlentities(\Input::get('input-salary-range'));
		$gender = htmlentities(\Input::get('input-gender'));
		$hiring = htmlentities(\Input::get('input-hiring'));
		$qualification_id = htmlentities(\Input::get('input-qualification'));
		$min_year_exp = htmlentities(\Input::get('input-min-year-exp'));
		$age_range = htmlentities(\Input::get('input-age-range'));
		$function_id = htmlentities(\Input::get('input-function'));
		$industry_id  = htmlentities(\Input::get('input-industry'));
		$closing_date = htmlentities(\Input::get('input-closing-date'));
		
		
		// Validate required fields.
		$validator = \Validator::make(Input::all(), [
				'input-job-title' => 'required',
				'input-job-description' => 'required'
		],
		[
			'required' => 'Field is reqired.'
		]);
		
		// Return back if validation fail.
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}		
		
		// Store a new job post to the database.		
		$job = new \Job;		
		$job->employer_id = $emp_id;
		$job->title = $title; 
		$job->job_description = $job_description;
		$job->salary_range = !empty($salary_range) ? $salary_range : null;
		$job->gender = !empty($gender) ? $gender : 'Negotiable';
		$job->hiring = !empty($hiring) ? $hiring : null;
		$job->qualification_id = !empty($qualification_id) ? $qualification_id : null;
		$job->min_year_exp = !empty($min_year_exp) ? $min_year_exp : null;
		$job->age_range = !empty($age_range) ? $age_range : null;
		$job->function_id = !empty($function_id) ? $function_id : null;
		$job->industry_id = !empty($industry_id) ? $industry_id : null;
		$job->published_date = date("Y-m-d");
		$job->closing_date = !empty($closing_date) ? $closing_date : null;
		
		$job->save();
	}
}