<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateEmployerRelatedTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact_people', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('employer_id');
			$table->string('contact_name');
			$table->integer('phone_number');
			$table->string('email');
			$table->timestamps();
		});
		
		Schema::create('jobs', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('employer_id');
			$table->string('title');
			$table->longText('job_description')->nullable();
			$table->string('salary_range')->nullable();
			$table->char('gender', 1)->nullable();
			$table->integer('hiring')->nullable();
			$table->integer('qualification_id')->nullable();
			$table->integer('min_year_exp')->nullable();
			$table->string('age_range')->nullable();
			$table->integer('function_id')->nullable();
			$table->integer('industry_id')->nullable();
			$table->integer('status')->default(1);
			$table->date('published_date')->nullable();
			$table->date('closing_date')->nullable();
			$table->timestamps();
		});		
		
		Schema::create('required_locations', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('job_id');
			$table->integer('location_id');
			$table->timestamps();
		});
		
		Schema::create('required_languages', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('job_id');
			$table->integer('lang_id');
			$table->timestamps();
		});
		
		Schema::create('required_job_terms', function ($table){
			$table->bigIncrements('id');
			$table->bigInteger('job_id');
			$table->integer('term_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact_people');
		Schema::drop('jobs');
		Schema::drop('required_locations');
		Schema::drop('required_languages');
		Schema::drop('required_job_terms');
	}

}
