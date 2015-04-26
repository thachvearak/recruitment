<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();		

		$this->call('ConstantTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('CandidateSeeder');
		$this->call('EmployerSeeder');
	}

}
