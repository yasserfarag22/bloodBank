<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->string('email')->unique(); 
            $table->string('phone');
            $table->string('password');
            $table->integer('blood_type_id')->unsigned()->nullable(); 
            $table->date('date_of_birth')->nullable();
            $table->date('last_donation_date')->nullable(); 
            $table->integer('city_id')->unsigned()->nullable(); 
            $table->boolean('is_active')->default(1); 
            $table->string('pin_code')->nullable(); 
       
            $table->timestamps();
		});
    }

	public function down()
	{
		Schema::drop('clients');
	}
}