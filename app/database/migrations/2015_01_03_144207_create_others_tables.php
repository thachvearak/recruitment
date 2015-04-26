<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateOthersTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('constant_marital', function ($table){
			$table->increments('id');
			$table->string('status');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
		
		Schema::create('constant_gender', function ($table){
			$table->char('id', 1);
			$table->string('sex');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
			
			$table->primary('id');
		});
		
		Schema::create('constant_locations', function ($table){
			$table->increments('id');
			$table->string('name');
			$table->char('code', 3);
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
		
		Schema::create('constant_functions', function ($table){
			$table->increments('id');
			$table->string('name');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
		
		Schema::create('constant_industries', function ($table){
			$table->increments('id');
			$table->string('name');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
		
		Schema::create('constant_countries', function ($table){
			$table->char('id', 3);
			$table->string('name');
			$table->string('nationality');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
			
			$table->primary('id');
		});
		
		Schema::create('constant_degrees', function ($table){
			$table->increments('id');
			$table->string('description');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
		
		Schema::create('constant_levels', function ($table){
			$table->increments('id');
			$table->string('description');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
		
		Schema::create('constant_sch_situations', function ($table){
			$table->increments('id');
			$table->string('description');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
		
		Schema::create('constant_job_terms', function ($table){
			$table->increments('id');
			$table->string('term');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
		
		Schema::create('constant_proficiencies', function ($table){
			$table->increments('id');
			$table->string('proficiency');
			$table->tinyInteger('sort_id')->nullable();
			$table->tinyInteger('deleted')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('constant_marital');
		Schema::drop('constant_gender');
		Schema::drop('constant_locations');
		Schema::drop('constant_functions');
		Schema::drop('constant_industries');
		Schema::drop('constant_countries');
		Schema::drop('constant_degrees');
		Schema::drop('constant_levels');
		Schema::drop('constant_sch_situations');
		Schema::drop('constant_job_terms');
		Schema::drop('constant_proficiencies');
	}

}
