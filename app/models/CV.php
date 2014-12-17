<?php

class CV extends Eloquent 
{
	protected $table = 'cv';
	protected $fillable = [
			'surname', 'name', 'sex', 'date_of_birth', 'marital_status', 
			'nationality', 'phone_number', 'email', 'residence', 'address', 
			'desired_industry', 'desired_function', 'desired_location', 'desired_salary', 
			'desired_position', 'current_job_title', 'available_date', 'created_at', 'updated_at'
	];
}
