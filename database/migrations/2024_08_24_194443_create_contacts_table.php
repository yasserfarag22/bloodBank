<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id');
			$table->string('name');
			$table->string('email');
			$table->string('subject');
			$table->text('message');
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}