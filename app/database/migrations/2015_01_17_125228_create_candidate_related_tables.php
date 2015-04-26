<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCandidateRelatedTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cv', function($table){
			$table->bigIncrements('id');
			$table->bigInteger('candidate_id');
			$table->string('title');
			$table->tinyInteger('searchable')->default(1);
			$table->longText('reference')->nullable();
			$table->longText('summary')->nullable();
			$table->string('salary_range')->nullable();
			$table->datetime('available_datetime')->nullable();
			$table->timestamps();
		});
		
		Schema::create('can_educations', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('cv_id');
			$table->string('institute')->nullable();
			$table->string('major')->nullable();
			$table->integer('degree_id')->nullable();
			$table->integer('situation_id')->nullable();
			$table->integer('from_year')->nullable();
			$table->integer('grad_year')->nullable();
			$table->timestamps();			
		});
		
		Schema::create('can_experiences', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('cv_id');
			$table->string('job_title');
			$table->string('company_name');
			$table->integer('industry_id')->nullable();
			$table->integer('function_id')->nullable();
			$table->text('location')->nullable();
			$table->integer('from_month')->nullable();
			$table->integer('from_year')->nullable();
			$table->integer('to_month')->nullable();
			$table->integer('to_year')->nullable();
			$table->text('job_description')->nullable();
			$table->text('leaving_reason')->nullable();
			$table->timestamps();
		});
		
		Schema::create('can_skills', function($table){
			$table->bigIncrements('id');
			$table->bigInteger('cv_id');
			$table->string('name');
			$table->integer('level_id');
			$table->integer('year_experience')->nullable();
			$table->timestamps();
		});
		
		Schema::create('can_languages', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('cv_id');
			$table->string('language');
			$table->integer('proficiency_id');
			$table->timestamps();
		});
		
		Schema::create('can_exp_functions', function ($table){
			$table->bigInteger('cv_id');
			$table->integer('function_id');
			$table->timestamps();
			
			$table->primary(['cv_id', 'function_id']);
		});
		
		Schema::create('can_exp_industries', function ($table){
			$table->bigInteger('cv_id');
			$table->integer('industry_id');
			$table->timestamps();
			
			$table->primary(['cv_id', 'industry_id']);
		});
		
		Schema::create('can_exp_job_terms', function ($table){
			$table->bigInteger('cv_id');
			$table->integer('term_id');
			$table->timestamps();
			
			$table->primary(['cv_id', 'term_id']);
		});
		
		Schema::create('can_exp_locations', function ($table){
			$table->bigInteger('cv_id');
			$table->integer('location_id');
			$table->timestamps();
			
			$table->primary(['cv_id', 'location_id']);
		});
		
		Schema::create('can_cover_letters', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('candidate_id');
			$table->integer('paragraph');
			$table->timestamps();
		});
		
		Schema::create('can_applied_jobs_list', function ($table){
			$table->bigInteger('job_id');
			$table->bigInteger('candidate_id');
			$table->integer('paragraph');
			$table->date('applied_date');
			
			$table->primary(['job_id', 'candidate_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cv');
		Schema::drop('can_educations');
		Schema::drop('can_experiences');
		Schema::drop('can_skills');
		Schema::drop('can_languages');
		Schema::drop('can_exp_functions');
		Schema::drop('can_exp_industries');
		Schema::drop('can_exp_job_terms');
		Schema::drop('can_exp_locations');
		Schema::drop('can_cover_letters');
		Schema::drop('can_applied_jobs_list');
	}

}
