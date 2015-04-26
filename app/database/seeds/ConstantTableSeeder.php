<?php
class ConstantTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Seed table Marital.
		DB::table ( 'constant_marital' )->truncate ();		
		DB::table ( 'constant_marital' )->insert([
			['status' => 'Single', 'sort_id' => 0],
			['status' => 'Married', 'sort_id' => 1],
			['status' => 'Divorced', 'sort_id' => 2],
		]);
		
		
		// Seed table Gender
		DB::table ( 'constant_gender' )->truncate ();
		DB::table ( 'constant_gender' )->insert([
			['id' => 'M', 'sex' => 'Male', 'sort_id' => 0],
			['id' => 'F', 'sex' => 'Female', 'sort_id' => 1],
		]);
		
		// Seed table locations.
		DB::table ( 'constant_locations' )->truncate ();
		DB::table ( 'constant_locations' )->insert([
			['name' => 'Phnom Penh', 'code' => '200'],
			['name' => 'Kampong Chhnange', 'code' => '100'],
			['name' => 'Siemreab', 'code' => '100'],
			['name' => 'Takeo', 'code' => '200'],
			['name' => 'Sihanuk ville', 'code' => '200'],
			['name' => 'Mondulkiri', 'code' => '100'],
			['name' => 'Battambang', 'code' => '100'],
			['name' => 'Pursat', 'code' => '100'],
			['name' => 'Kampong Cham', 'code' => '100'],
		]);
				
		// Seed table functions.
		DB::table ( 'constant_functions' )->truncate ();
		DB::table ( 'constant_functions' )->insert([
			['name' => 'Accounting / Financial' ],
			['name' => 'Administrative'],
			['name' => 'Advertising / Media'],
			['name' => 'Architecture'],
			['name' => 'Arts / Creative Design'],
			['name' => 'Assistant / Secretary'],
			['name' => 'Audit / Taxation'],
			['name' => 'Automotive / Vehicle'],
			['name' => 'Banking / Insurance'],
			['name' => 'Catering / Fast food restaurant'],
			['name' => 'Construction / Engineering'],
			['name' => 'Cosmetic Services'],
			['name' => 'Customer Service'],
			['name' => 'Education / Teaching'],
			['name' => 'Electronic / Electrical / Equipment'],
			['name' => 'Food & Beverages'],
			['name' => 'Freight / Shipping / Delivery'],
			['name' => 'General Business Services'],
			['name' => 'Human Resources / Consultant'],
			['name' => 'IT'],
			['name' => 'Lawyer / Legal Services'],
			['name' => 'Management'],
			['name' => 'Manufacturing'],
			['name' => 'Marketing'],
			['name' => 'Medical / Health / Nursing'],
			['name' => 'Merchandising / Purchasing'],
			['name' => 'Operation'],
			['name' => 'Project Management'],
			['name' => 'Property / Real Estate'],
			['name' => 'Quality Control'],
			['name' => 'Restaurant / Hotel / Casino'],
			['name' => 'Sale'],
			['name' => 'Security guard / Driver'],
			['name' => 'Technician'],
			['name' => 'Telecommunication'],
			['name' => 'Tourism / Guide'],
			['name' => 'Trading / Import-Export'],
			['name' => 'Translation / Interpretation'],
			['name' => 'Travel Agent / Ticket Sales'],
			['name' => 'Other'],
		]);		

		// Seed table industries.
		DB::table ( 'constant_industries' )->truncate ();
		DB::table ( 'constant_industries' )->insert([
			['name' => 'Advertising / Media / Publishing' ],
			['name' => 'Architecture / Construction'],
			['name' => 'Banking / Financial'],
			['name' => 'Clothing / Garment'],
			['name' => 'Cosmetics / Beauty' ],
			['name' => 'Education'],
			['name' => 'Information Technology'],
			['name' => 'Insurance'],
			['name' => 'Energy / Oil / Gasoline'],
			['name' => 'Entertainment'],
			['name' => 'Food & Beverages'],
			['name' => 'Freight / Shipping / Delivery'],
			['name' => 'General Business Services'],
			['name' => 'Hospital / Pharmacy'],
			['name' => 'Industrial Machinery'],
			['name' => 'Hotel / Accommodation'],
			['name' => 'Human Resources / Consultant'],
			['name' => 'Manufacturing'],
			['name' => 'NGO / Social Services'],
			['name' => 'Other'],
			['name' => 'Property Management'],
			['name' => 'Real Estate'],
			['name' => 'Recruiting Services'],
			['name' => 'Sports &amp; Recreation'],
			['name' => 'Telecommunication'],
			['name' => 'Tourism'],
			['name' => 'Trading'],
			['name' => 'Wholesale / Retail'],
		]);
		
		// Seed table countries.
		DB::table ( 'constant_countries' )->truncate ();
		DB::table ( 'constant_countries' )->insert([
			['id' => 'KHM', 'name' => 'Cambodia', 'nationality' => 'Cambodian'],
			['id' => 'THA', 'name' => 'Thailand', 'nationality' => 'Thai'],
			['id' => 'VNM', 'name' => 'Vietnam', 'nationality' => 'Vietnamese'],
			['id' => 'LAO', 'name' => 'Laos', 'nationality' => 'Lao'],
			['id' => 'PHL', 'name' => 'Philippines', 'nationality' => 'Philippine'],
			['id' => 'USA', 'name' => 'US', 'nationality' => 'American'],
			['id' => 'CHN', 'name' => 'China', 'nationality' => 'Chinese'],
		]);
		
		// Seed table Job Term.
		DB::table('constant_job_terms')->truncate();
		DB::table('constant_job_terms')->insert([
			['term' => 'Full Time'],
			['term' => 'Part Time'],
			['term' => 'Internship'],
			['term' => 'Volunteer'],
			['term' => 'Freelance'],
		]);
		
		// Seed table Degree.
		DB::table('constant_degrees')->truncate();
		DB::table('constant_degrees')->insert([
			['description' => 'Bachelor\'s degree'],
			['description' => 'Master\'s degree'],
			['description' => 'PhD'],
		]);
		
		// Seed table Schooling Situation.
		DB::table('constant_sch_situations')->truncate();
		DB::table('constant_sch_situations')->insert([
			['description' => 'Studying', 'sort_id' => 1],
			['description' => 'Finished', 'sort_id' => 2],
			['description' => 'Leave', 'sort_id' => 3],
		]);
		
		// Seed table Level.
		DB::table('constant_levels')->truncate();
		DB::table('constant_levels')->insert([
			['description' => 'Poor'],
			['description' => 'Fair'],
			['description' => 'Good'],
			['description' => 'Very Good'],
			['description' => 'Excellent'],
		]);
		
		// Seed table proficiencies.
		DB::table('constant_proficiencies')->truncate();
		DB::table('constant_proficiencies')->insert([
			['proficiency' => 'Elementary proficiency', 'sort_id' => 1],
			['proficiency' => 'Limited working proficiency', 'sort_id' => 2],
			['proficiency' => 'Full professional proficiency', 'sort_id' => 3],
			['proficiency' => 'Native or billingual proficiency', 'sort_id' => 4],
		]);
	}
}