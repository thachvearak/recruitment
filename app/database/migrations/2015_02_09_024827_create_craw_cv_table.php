<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawCvTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crawl_cv', function($table){
			$table->bigIncrements('id');
			$table->string('surname');
			$table->string('name');
			$table->string('email')->nullable();
			$table->string('contact_number')->nullable();
			$table->integer('year_exp')->nullable();
			$table->integer('month_exp')->nullable();
			$table->string('current_job_title')->nullable();
			$table->string('current_employer')->nullable();
			$table->string('attach_resume')->nullable();
			$table->integer('created_by');
			$table->integer('updated_by')->nullable();
			$table->timestamps();
		});

		Schema::create('crawl_skill_set', function($table){
			$table->bigIncrements('id');
			$table->bigInteger('cv_id');
			$table->string('skill_name');
		});

		Schema::create('crawl_qualification', function($table){
			$table->bigIncrements('id');
			$table->bigInteger('cv_id');
			$table->string('qualification');
			$table->string('description');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crawl_cv');
		Schema::drop('crawl_skill_set');
		Schema::drop('crawl_qualification');
	}

}
