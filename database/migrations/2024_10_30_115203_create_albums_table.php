<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing ID
            $table->string('name');
            $table->year('year'); // Assuming you want to store the year
            $table->integer('times_sold');
            $table->foreignId('band_id')->constrained('bands')->onDelete('cascade'); // This creates the foreign key
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
