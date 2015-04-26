<?php
class CVTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() 
	{		
		DB::table ('cv')->truncate ();
		DB::table ('can_exp_functions')->truncate ();
		DB::table ('can_exp_industries')->truncate ();
		DB::table ('can_exp_job_terms')->truncate ();
		DB::table ('can_exp_salaries')->truncate ();
		DB::table ('can_exp_locations')->truncate ();
		DB::table ('can_languages')->truncate ();
		DB::table ('can_skills')->truncate ();
		DB::table ('can_experiences')->truncate ();
		DB::table ('can_educations')->truncate ();
		
		$cv = CV::create ( [ 
			'candidate_id'		=> 2,
			'title'				=> 'CV 1',
			'searchable'		=> 1,  
			'reference'			=> 'Sentence 1 puts forth the main claim: The punishment of criminals has always been a problem for society. Sentence 2 specifies the exact nature of the problem by listing society\'s choices: Citizens have had to decide whether offenders such as first-degree murderers should be killed in a gas chamber, imprisoned for life, or rehabilitated and given a second chance in society. Sentence 3 further develops the topic by stating one point of view: Many citizens argue that serious criminals should be executed. The reasons for this point of view are then provided in sentence 4: They believe that killing criminals will set an example for others and also rid society of a cumbersome burden.',
			'summary'			=> 'Professional with 20+ years of experience in IT and Education industry.',
			'available_datetime' => date('Y-m-d',strtotime('12/20/2014'))
		] );	
		
		DB::table('can_exp_functions')->insert([
			['cv_id' => $cv->id, 'function_id' => 1, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'function_id' => 3, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'function_id' => 5, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
		]);
		
		DB::table('can_exp_industries')->insert([
			['cv_id' => $cv->id, 'industry_id' => 2, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'industry_id' => 4, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'industry_id' => 5, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'industry_id' => 3, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
		]);
		
		DB::table('can_exp_job_terms')->insert([
			['cv_id' => $cv->id, 'term_id' => 1, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
		]);
		
		DB::table('can_exp_salaries')->insert([
			['cv_id' => $cv->id, 'min' => 200, 'max' => null, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'min' => null, 'max' => 100, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'min' => 300, 'max' => 2000, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'min' => 1000, 'max' => 3000, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
		]);
		
		DB::table('can_exp_locations')->insert([
			['cv_id' => $cv->id, 'location_id' => 1, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'location_id' => 3, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
		]);
		
		DB::table('can_languages')->insert([
			['cv_id' => $cv->id, 'language' => 'English', 'proficiency_id' => 2, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'language' => 'Korean', 'proficiency_id' => 1, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
		]);
		
		
		DB::table('can_skills')->insert([
			['cv_id' => $cv->id, 'name' => 'Ecommerce', 'level_id' => 2, 'year_experience' => 3, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'name' => 'Email Marketing', 'level_id' => 3, 'year_experience' => 5, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
			['cv_id' => $cv->id, 'name' => 'Database Administration', 'level_id' => 3, 'year_experience' => 5, 'created_at' => date('Y-m-d',strtotime('12/20/2014')), 'updated_at' => date('Y-m-d',strtotime('12/20/2014'))],
		]);
		
		DB::table('can_experiences')->insert([
			[
				'cv_id' => $cv->id, 
				'job_title' => 'Web Developer for Automotive Company', 
				'company_name' => 'BlaudaCam', 
				'industry_id' => 2, 
				'function_id' => 4, 
				'location' => 'Phnom Penh', 
				'from_month' => 1,
				'from_year' => 2013,
				'to_month' => 9,
				'to_year' => 2014,
			],
			[
				'cv_id' => $cv->id, 
				'job_title' => 'Billing and Customer Care Service', 
				'company_name' => 'Metfone', 
				'industry_id' => 6, 
				'function_id' => 3, 
				'location' => 'Kampong Chhnang', 
				'from_month' => 11,
				'from_year' => 2014,
				'to_month' => null,
				'to_year' => null,
			],
		]);
		
		DB::table('can_educations')->insert([
			[
				'cv_id' => $cv->id, 
				'institute' => 'Norton University',
				'major' => 'Computer Science',
				'degree_id' => 1,
				'situation_id' => 2,
				'from_year' => 2004,
				'grad_year' => 2008,
			],
		]);		
	}
}
