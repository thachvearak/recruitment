<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function ($table){
			$table->bigIncrements('id');
			$table->string('username');
			$table->string('email')->nullable();
			$table->string('password');
			$table->tinyInteger('activated')->default(0);
			$table->tinyInteger('role')->nullable();
			$table->tinyInteger('user_type')->nullable();
			$table->tinyInteger('agree_term')->nullable();
			$table->string('remember_token')->nullable();
			$table->timestamps();
			
			$table->unique('username');
			$table->unique('email');
		});
		
		Schema::create('candidates', function ($table){
			$table->bigInteger('id');
			$table->string('surname');
			$table->string('name');
			$table->char('sex', 1);
			$table->date('date_of_birth');
			$table->tinyInteger('marital_id')->nullable();
			$table->char('nationality_id', 3)->nullable();
			$table->string('address', 500)->nullable();
			$table->tinyInteger('city_province_id')->nullable();
			$table->integer('postal')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('email')->nullable();
			$table->timestamps();
			
			$table->primary('id');
		});
		
		Schema::create('employers', function($table){
			$table->bigInteger('id');
			$table->string('company_name')->nullable();
			$table->integer('industry_id')->nullable();
			$table->integer('total_employees')->nullable();
			$table->string('address', 500)->nullable();
			$table->tinyInteger('city_province_id')->nullable();
			$table->string('services')->nullable();
			$table->string('products')->nullable();
			$table->text('description')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('fax')->nullable();
			$table->string('website')->nullable();
			$table->string('map_latitute')->nullable();
			$table->string('map_longitute')->nullable();
			$table->string('logo')->nullable();
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
		Schema::drop('users');
		Schema::drop('candidates');
		Schema::drop('employers');
	}

}
