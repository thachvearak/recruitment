<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDesireTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'industry', function ($table) {
			$table->increments ( 'id' );
			$table->string ( 'name', 500 );
			$table->timestamps ();
		} );
		
		Schema::create ( 'function', function ($table) {
			$table->increments ( 'id' );
			$table->string ( 'name', 500 );
			$table->timestamps ();
		} );
		
		Schema::create ( 'location', function ($table) {
			$table->increments ( 'id' );
			$table->string ( 'name', 500 );
			$table->string ( 'type', 3 )->nullable ();
			$table->timestamps ();
		} );
		
		Schema::create ( 'salary', function ($table) {
			$table->increments ( 'id' );
			$table->string ( 'range', 500 );
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'industry' );
		
		Schema::drop ( 'function' );
		
		Schema::drop ( 'location' );
		
		Schema::drop ( 'salary' );
	}
}
