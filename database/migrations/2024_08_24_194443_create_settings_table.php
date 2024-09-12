<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notification_setting_text');
			$table->text('about_app');
			$table->string('phone');
			$table->string('email');
			$table->text('fb_link');
			$table->string('tw_link');
			$table->string('wa_link');
			$table->text('insta_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}