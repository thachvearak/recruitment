<?php
class CVTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table ( 'cv' )->truncate ();
		
		CV::create ( [ 
			'surname' => 'Chea', 
			'name' => 'Bonnak', 
			'sex' => 'M', 
			'date_of_birth' => date('Y-m-d',strtotime('10/16/2003')), 
			'marital_status' => 0, 
			'nationality' => '2', 
			'phone_number' => '098765678', 
			'email' => 'example@gmail.com', 
			'residence' => 'Phnom Penh', 
			'address' => '#57, st 134, Tuol Tumpoung 2, Chamkar Morn', 
			'desired_industry' => 3, 
			'desired_function' => 5, 
			'desired_location' => 3, 
			'desired_salary' => 3, 
			'desired_position' => 9, 
			'current_job_title' => 'Web Developer', 
			'available_date' => date('Y-m-d',strtotime('12/20/2014'))
		] );	
		
		CV::create ( [ 
			'surname' => 'Chea', 
			'name' => 'Bonnak', 
			'sex' => 'M', 
			'date_of_birth' => date('Y-m-d',strtotime('10/16/2003')), 
			'marital_status' => 0, 
			'nationality' => '2', 
			'phone_number' => '098765678', 
			'email' => 'example@gmail.com', 
			'residence' => 'Phnom Penh', 
			'address' => '#57, st 134, Tuol Tumpoung 2, Chamkar Morn', 
			'desired_industry' => 3, 
			'desired_function' => 5, 
			'desired_location' => 3, 
			'desired_salary' => 3, 
			'desired_position' => 9, 
			'current_job_title' => 'Web Developer', 
			'available_date' => date('Y-m-d',strtotime('12/20/2014'))
		] );
		
		CV::create ( [ 
			'surname' => 'Chea', 
			'name' => 'Bonnak', 
			'sex' => 'M', 
			'date_of_birth' => date('Y-m-d',strtotime('10/16/2003')), 
			'marital_status' => 0, 
			'nationality' => '2', 
			'phone_number' => '098765678', 
			'email' => 'example@gmail.com', 
			'residence' => 'Phnom Penh', 
			'address' => '#57, st 134, Tuol Tumpoung 2, Chamkar Morn', 
			'desired_industry' => 3, 
			'desired_function' => 5, 
			'desired_location' => 3, 
			'desired_salary' => 3, 
			'desired_position' => 9, 
			'current_job_title' => 'Web Developer', 
			'available_date' => date('Y-m-d',strtotime('12/20/2014'))
		] );	
	}
}
