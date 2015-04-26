<?php
class UserTableSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		
		/*****  Users table *****/
		DB::table ( 'users' )->truncate ();
		
		// Admin backend user.
		User::create ( [ 
			'username' => 'admin',
			'password'	=> Hash::make('12345678'),
			'activated'	=> 1,
			'role'	=> 0, // Admin
		] );
		
		// Employee login user.
		User::create ( [ 
			'username' => 'employee1',
			'password'	=> Hash::make('12345678'),
			'email'		=> 'employee1@mail.com',
			'activated'	=> 1,
			'user_type'	=> 2,
			'agree_term'	=> 1,
		] );
		
		// Employer login user
		User::create ( [ 
			'username' => 'employer1',
			'password'	=> Hash::make('12345678'),
			'email'		=> 'employer1@mail.com',
			'activated'	=> 1,
			'user_type'	=> 1,
			'agree_term'	=> 1,
		] );		
	}
}