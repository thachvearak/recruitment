<?php
class EmployerSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		/**
		 * *** Employer table ****
		 */
		\DB::table ( 'employers' )->truncate ();
		
		\Employer::create ( [ 
				'id' => 3,
				'company_name' => 'Home',
				'industry_id' => 3,
				'address' => '#45E0, st 123, Tuol Tumpoung I, Chamkar Morn',
				'city_province_id' => 1,
				'description' => 'We are a global company. we are specialised in IT industrial for over 20 years.',
				'phone_number' => '023898756',
				'fax' => '023897665',
				'website' => 'www.google.com' 
		] );
		
		/**
		 * *** Job table ****
		 */
		\DB::table ( 'jobs' )->truncate ();
		
		\Job::create ( [ 
				'employer_id' => 3,
				'title' => 'Web developer for controlling stocks',
				'job_description' => 'We are looking for hiring 20 candidates on positions: Web developers.',
				'salary_range' => '$300 - $500',
				'hiring' => 10,
				'qualification_id' => 1,
				'min_year_exp' => 1,
				'age_range' => '20 - Up',
				'function_id' => 20,
				'industry_id' => 7,
				'published_date' => \Carbon\Carbon::today (),
				'closing_date' => \Carbon\Carbon::today ()->addDays ( 10 ) 
		] );
		
		\Job::create ( [ 
				'employer_id' => 3,
				'title' => 'Recieptionist at welcome stage',
				'job_description' => 'We are looking 3 recieptionist.',
				'salary_range' => '$300 - $500',
				'hiring' => 3,
				'qualification_id' => 1,
				'age_range' => '20 - Up',
				'function_id' => 6,
				'industry_id' => 7,
				'published_date' => \Carbon\Carbon::today (),
				'closing_date' => \Carbon\Carbon::today ()->addDays ( 10 ) 
		] );
	}
}