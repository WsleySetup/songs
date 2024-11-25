<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bands', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incrementing
            $table->string('name')->nullable(false); // Name of the band, not nullable
            $table->string('genre')->nullable(false); // Genre, not nullable
            $table->integer('founded')->length(4); // Year founded, length 4
            $table->string('active_till')->default('Heden'); // Active till, default "Heden"
            $table->foreignId('album_id');
            $table->timestamps(); // Created_at and Updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bands');
    }
}
