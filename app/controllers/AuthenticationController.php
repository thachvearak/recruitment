<?php

class AuthenticationController extends BaseController{

	public function adminLogin()
	{
		return View::make('admin.login');
	}

	public function adminLoginPost()
	{
		$username = Input::get('user_name');
		$password = Input::get('password');

		$validator = Validator::make(Input::all(), [
			'user_name' => 'required|min:2',
			'password' => 'required|min:4|max:12'
		]);

		if($validator->fails())
		{
			return Redirect::route('admin.login')->withErrors($validator);
		}else
		{
			$auth=Auth::attempt([
				'user_name'	=> $username, 
				'password'	=> $password,
				'user_type' => null,
				'activated'	=> 1
			]);

			if($auth)
			{
				return Redirect::route('admin.home')->with('global', 'You are now logged in!');
			}else{
				return Redirect::back()->with('global', 'Username or password was incorrect.')->withInput();
			}
		}
	}

	public function adminRegister()
	{
		return View::make('admin.register');
	}

	public function adminRegisterPost()
	{
		$validator = Validator::make(Input::all(), User::$rules);

		if($$validator->passes()){
			$user = new User;
			$user->user_name = Input::get('user_name');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->role = 0;
			$user->activated = Input::get('status');
			$user->save();

			return Redirect::to('admin.login')->with('global', 'Register successfully');
		}else{
			return Redirect::to('admin.register')->with('global','The following errors occurred')->withErrors($vali)->withInput();
		}
	}

	public function adminLogoutPost()
	{
		Auth::logout();
		return Redirect::route('admin.login');
	}
	
	public function getUserLogin()
	{
		return View::make('login');
	}
	
	public function postUserLogin()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		
		$validator = Validator::make(Input::all(), [
			'username' => 'required',
			'password' => 'required'
		]);
		
		if($validator->fails())
		{
			return Redirect::route('user.login')->withErrors($validator);
		}
		else
		{
			$auth_username = Auth::attempt([
				'username'	=> $username,
				'password'	=> $password,
				'role' 		=> null,
				'activated'	=> 1
			]);
			
			$auth_email = Auth::attempt([
				'email'		=> $username,
				'password'	=> $password,
				'role' 		=> null,
				'activated'	=> 1
			]);
			
		
			if($auth_username || $auth_email)
			{
				switch (Auth::user()->user_type)
				{
					case 1: // Employer
						return Redirect::route('home')->with('global', 'You are now logged in!');
						break;
						
					case 2: // Employee
						return Redirect::route('home')->with('global', 'You are now logged in!');
						break;
				}
			}
			else
			{
				
				return Redirect::route('user.login')->with('global', 'Username or password was incorrect.')->withInput();
			}
		}
	}
	
	public function getUserlogout()
	{
		Auth::logout();
		
		return Redirect::route('user.login');
	}
	
	public function getUserRegister()
	{
		if(!Auth::guest() && Auth::user()->role === null)
		{
			return Redirect::to('/');
		}
		
		return View::make('register');
	}
	
	public function postUserRegister()
	{
		$username = Input::get('user_name');
		$email = Input::get('email');
		$password = Input::get('password');
		
		$validator = Validator::make(Input::all(), [
			'user_name' 		=> 'required',
			'email'				=> 'required|email',
			'password' 			=> 'required|alpha_num|between:4,12',
			'password-confirm' 	=> 'required|same:password',
			'user_type'			=> 'required',
			'term_condition'	=> 'required'
		]);
		
		// Check input validation.
		if($validator->fails())
		{
			return Redirect::route('user.register')
						->withErrors($validator)
						->withInput();
		}
		else
		{
			// Check if username or email is already taken.
			$username_exist = User::hasUserName($username);
			$email_exist = User::hasEmail($email);
			
			if($username_exist && $email_exist)
			{
				return Redirect::route('user.register')
								->with([
											'username_exist' 	=> 'This username has been taken',
											'email_exist'		=> 'This email has been taken'
										])
								->withInput();
			}
			elseif ($username_exist)
			{
				return Redirect::route('user.register')
								->with(['username_exist' => 'This username has been taken'])
								->withInput();
			}
			elseif ($email_exist)
			{
				return Redirect::route('user.register')
								->with(['email_exist' => 'This email has been taken'])
								->withInput();
			}
				
			// Create a new user.
			$user = new User;
			$user->user_name = Input::get('user_name');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');
			$user->user_type = Input::get('user_type');
			$user->term_condition = Input::get('term_condition');
			$user->save();
			
			return Redirect::route('user.login')
							->with('activation_message', 'Thank for registering with us. Please activate your account.');
		}
	}
}