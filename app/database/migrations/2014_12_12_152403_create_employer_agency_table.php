<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerAgencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employer', function($table){
			$table->integer('id');
			$table->string('company_name');
			$table->string('phone');
			$table->string('fax')->nullable();
			$table->tinyInteger('type');
			$table->tinyInteger('industry');
			$table->integer('num_employee')->nullable();
			$table->text('address');
			$table->string('location');
			$table->text('services')->nullable();
			$table->text('products')->nullable();
			$table->text('description')->nullable();
			$table->string('website')->nullable();
			$table->string('contact_person')->nullable();
			$table->string('contact_person_number')->nullable();
			$table->string('contact_person_email')->nullable();
			$table->string('map_latitude')->nullable();
			$table->string('map_longitude')->nullable();
			$table->timestamps();
			
			$table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('employer');
	}

}
