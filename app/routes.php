<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'MainController@index']);
Route::get('register', ['as' => 'user.register', 'uses' => 'AuthenticationController@getUserRegister']);
Route::get('login', ['as' => 'user.login', 'uses' => 'AuthenticationController@getUserLogin']);
Route::group(['before' => 'auth'], function (){
	
	/***********************************
	 * Candidate
	 ***********************************/
	Route::get('/user/candidate', ['as' => 'candidate', 'uses' => 'CandidateController@index']);
	Route::get('/user/candidate/profile', ['as' => 'candidate.cv.profile', 'uses' => 'CandidateController@getProfile']);
	Route::post('/user/candidate/profile', ['as' => 'candidate.cv.profile.post', 'uses' => 'CandidateController@postProfile']);
	Route::get('/user/candidate/cv', ['as' => 'candidate.cvs', 'uses' => 'CandidateController@getCVs']);
	Route::get('/user/candidate/cv/create', ['as' => 'candidate.cv.create', 'uses' => 'CandidateController@getCVCreate']);
	Route::post('/user/candidate/cv/create', ['as' => 'candidate.cv.create.post', 'uses' => 'CandidateController@postCVCreate']);
	Route::get('/user/candidate/cv/edit/{id}', ['as' => 'candidate.cv.create.edit', 'uses' => 'CandidateController@getCVEdit']);
	
	// Route CV edit summary.
	Route::put('/user/candidate/cv/edit/{id}/summary', ['as' => 'candidate.cv.edit.summary.put', 'uses' => 'CandidateController@editCVSummary']);
	
	// Route CV edit experience.
	Route::post('/user/candidate/cv/edit/{cv_id}/experience', ['as' => 'candidate.cv.edit.experience.post', 'uses' => 'CandidateController@createCVExperience']);
	Route::put('/user/candidate/cv/edit/{cv_id}/experience/{id}', ['as' => 'candidate.cv.edit.experience.put', 'uses' => 'CandidateController@editCVExperience']);
	Route::delete('/user/candidate/cv/edit/{cv_id}/experience/{id}', ['as' => 'candidate.cv.edit.experience.delete', 'uses' => 'CandidateController@deleteCVExperience']);
	
	// Route CV edit education.
	Route::post('/user/candidate/cv/edit/{cv_id}/edu', ['as' => 'candidate.cv.edit.edu.post', 'uses' => 'CandidateController@createCVEdu']);
	Route::put('/user/candidate/cv/edit/{cv_id}/edu/{id}', ['as' => 'candidate.cv.edit.edu.put', 'uses' => 'CandidateController@editCVEdu']);
	Route::delete('/user/candidate/cv/edit/{cv_id}/edu/{id}', ['as' => 'candidate.cv.edit.edu.delete', 'uses' => 'CandidateController@deleteCVEdu']);
	
	// Route CV edit skill.
	Route::post('/user/candidate/cv/edit/{cv_id}/skill', ['as' => 'candidate.cv.edit.skill.post', 'uses' => 'CandidateController@createCVSkill']);
	Route::delete('/user/candidate/cv/edit/{cv_id}/skill/{id}', ['as' => 'candidate.cv.edit.skill.delete', 'uses' => 'CandidateController@deleteCVSkill']);
	
	// Route CV edit language.
	Route::post('/user/candidate/cv/edit/{cv_id}/lang', ['as' => 'candidate.cv.edit.lang.post', 'uses' => 'CandidateController@createCVLang']);
	Route::delete('/user/candidate/cv/edit/{cv_id}/lang/{id}', ['as' => 'candidate.cv.edit.lang.delete', 'uses' => 'CandidateController@deleteCVLang']);
	
	// Route CV edit function.
	Route::post('/user/candidate/cv/edit/{cv_id}/function', ['as' => 'candidate.cv.edit.function.post', 'uses' => 'CandidateController@createFunction']);
	Route::delete('/user/candidate/cv/edit/{cv_id}/function/{func_id}', ['as' => 'candidate.cv.edit.function.delete', 'uses' => 'CandidateController@deleteFunction']);
	
	// Route CV edit industry.
	Route::post('/user/candidate/cv/edit/{cv_id}/industry', ['as' => 'candidate.cv.edit.industry.post', 'uses' => 'CandidateController@createIndustry']);	
	Route::delete('/user/candidate/cv/edit/{cv_id}/industry/{industry_id}', ['as' => 'candidate.cv.edit.industry.delete', 'uses' => 'CandidateController@deleteIndustry']);	
	
	// Route CV edit location.
	Route::post('/user/candidate/cv/edit/{cv_id}/location', ['as' => 'candidate.cv.edit.location.post', 'uses' => 'CandidateController@createLocation']);
	Route::delete('/user/candidate/cv/edit/{cv_id}/location/{location_id}', ['as' => 'candidate.cv.edit.location.delete', 'uses' => 'CandidateController@deleteLocation']);	
	
	// Route CV edit salary.
	Route::put('/user/candidate/cv/edit/{cv_id}/salary', ['as' => 'candidate.cv.edit.salary.put', 'uses' => 'CandidateController@editSalary']);
	
	// Route CV edit job term.
	Route::post('/user/candidate/cv/edit/{cv_id}/job_term', ['as' => 'candidate.cv.edit.job_term.post', 'uses' => 'CandidateController@createJobTerm']);
	Route::delete('/user/candidate/cv/edit/{cv_id}/job_term/{job_term_id}', ['as' => 'candidate.cv.edit.job_term.delete', 'uses' => 'CandidateController@deleteJobTerm']);
	/**************************************************
	 **************************************************/
	
	/***********************************
	 * Employer
	 ***********************************/	
	Route::get('/user/employer', ['as' => 'employer', 'uses' => 'EmployerController@index']);
	Route::get('/user/employer/{emp_id}/job/list', ['as' => 'employer.job-list', 'uses' => 'EmployerController@getJobList']);
	Route::get('/user/employer/{emp_id}/job/post', ['as' => 'employer.job-post', 'uses' => 'EmployerController@getJobPost']);
	Route::post('/user/employer/{emp_id}/job/post', ['as' => 'employer.job-post.post', 'uses' => 'EmployerController@postJobPost']);	
	/**************************************************
	 **************************************************/
	
	// Logout
	Route::get('logout', ['as' => 'user.logout', 'uses' => 'AuthenticationController@getUserlogout']);
});

Route::group(['prefix' => 'admin', 'before' => 'auth-admin'], function (){
	Route::get('/', ['as' => 'admin.home', 'uses' => 'AdminController@index']);
	
	Route::get('cv', ['as' => 'admin.cv.index', 'uses' => 'AdminController@openCV']);	
	Route::get('cv-create', ['as' => 'admin.cv.create', 'uses' => 'AdminController@openCVCreate']);
	Route::post('cv-create', ['as' => 'admin.cv.create.store', 'uses' => 'AdminController@storeCV']);
});

Route::group(['prefix' => 'api'], function (){
	Route::resource('industry', 'IndustryController');
});

Route::get('admin/register', ['as' => 'admin.register', 'uses' => 'AuthenticationController@adminRegister']);
Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'AuthenticationController@adminLogin']);
Route::get('admin/logout', ['as' => 'admin.logout.post', 'uses' => 'AuthenticationController@adminLogoutPost']);
Route::group(['before' => 'csrf'], function(){
	Route::post('admin/register', ['as' => 'admin.register.post', 'uses' => 'AuthenticationController@adminRegisterPost']);
	Route::post('admin/login', ['as' => 'admin.login.post', 'uses' => 'AuthenticationController@adminLoginPost']);	
	Route::post('login', ['as' => 'user.login.post', 'uses' => 'AuthenticationController@postUserLogin']);
	Route::post('register', ['as' => 'user.register.post', 'uses' => 'AuthenticationController@postUserRegister']);
});

// App::missing(function($exception)
// {
// 	//return Response::view('errors.missing', array(), 404);
// 	return ['er' => '123'];
// });

// App::error(function(Exception $exception)
// {
// 	return [
// 		'error' => [
// 			'code' => $exception->getCode(),
// 			'message' => $exception->getMessage(),
// 		]
// 	];
// });