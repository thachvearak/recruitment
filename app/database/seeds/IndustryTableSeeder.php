<?php
class IndustryTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table ( 'industry' )->truncate ();
		
		Industry::create ( [ 
				'name' => 'Accounting/Audit/Tax Services' 
		] );		
		Industry::create ( [ 
				'name' => 'Airline' 
		] );
		Industry::create ( [ 
				'name' => 'Accounting/Audit/Tax Services'
		] );
		Industry::create ( [ 
				'name' => 'Accounting/Audit/Tax Services' 
		] );
		Industry::create ( [ 
				'name' => 'Accounting/Audit/Tax Services' 
		] );
		Industry::create ( [ 
				'name' => 'Accounting/Audit/Tax Services' 
		] );
		Industry::create ( [ 
				'name' => 'Accounting/Audit/Tax Services' 
		] );
		Industry::create ( [ 
				'name' => 'Accounting/Audit/Tax Services' 
		] );
	}
}
