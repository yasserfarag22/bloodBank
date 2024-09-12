<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodTypeClientTable extends Migration 
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blood_type_client', function (Blueprint $table) {
            $table->increments('id');
			$table->timestamps();
			$table->integer('client_id');
			$table->integer('blood_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_type_clients');
    }
};
