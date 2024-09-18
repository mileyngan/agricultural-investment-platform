<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->string('currency'); // Add other fields as necessary
            // Add more columns as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('generals');
    }
}
