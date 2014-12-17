<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_seekers', function($table){
			$table->integer('id');
			$table->string('surname');
			$table->string('name');
			$table->char('sex', 1);
			$table->date('date_of_birth');
			$table->tinyInteger('marital_status');
			$table->char('nationality', 3);
			$table->string('phone_number', 20);
			$table->string('email');
			$table->string('residence');
			$table->text('address')->nullable();
			$table->integer('desired_industry')->nullable();
			$table->integer('desired_function')->nullable();
			$table->integer('desired_location')->nullable();
			$table->integer('desired_salary')->nullable();
			$table->integer('desired_position')->nullable();
			$table->string('current_job_title')->nullable();
			$table->datetime('available_date')->nullable();
			$table->timestamps();
			
			$table->primary('id');
		});
		
		Schema::create('cv', function($table){
			$table->increments('id');
			$table->string('surname');
			$table->string('name');
			$table->char('sex', 1);
			$table->date('date_of_birth');
			$table->tinyInteger('marital_status');
			$table->char('nationality', 3);
			$table->string('phone_number', 20);
			$table->string('email');
			$table->string('residence');
			$table->text('address')->nullable();
			$table->integer('desired_industry')->nullable();
			$table->integer('desired_function')->nullable();
			$table->integer('desired_location')->nullable();
			$table->integer('desired_salary')->nullable();
			$table->integer('desired_position')->nullable();
			$table->string('current_job_title')->nullable();
			$table->datetime('available_date');
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
		Schema::drop('job_seekers');
		Schema::drop('cv');
	}

}
