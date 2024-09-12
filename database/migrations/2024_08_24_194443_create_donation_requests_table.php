<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id')->unsigned();
			$table->string('name');
			$table->string('phone');
			$table->integer('city_id')->unsigned();
			$table->string('hospital_name')->nullable();
			$table->integer('blood_type_id')->unsigned();
			$table->integer('age');
			$table->integer('bags');
			$table->text('hospital_location');
			$table->text('details')->nullable();
			$table->decimal('latitude', 10, 8)->nullable(); // Adjusted precision
			$table->decimal('longitude', 11, 8)->nullable(); // Adjusted precision
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}