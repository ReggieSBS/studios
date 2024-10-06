<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->integer('ebook_id')->nullable(false)->default(0);
            $table->string('name')->nullable(false);
            $table->string('gender')->nullable(false);
            $table->integer('age')->nullable(true);
            $table->string('profile_image')->nullable(true);
            $table->integer('main_character')->nullable(false)->default(0);
            $table->string('appearance_desc')->nullable(true);
            $table->string('personality_desc')->nullable(true);
            $table->string('accomplishment_desc')->nullable(true);
            $table->string('who_stops_desc')->nullable(true);
            $table->string('what_if_fails_desc')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
};
