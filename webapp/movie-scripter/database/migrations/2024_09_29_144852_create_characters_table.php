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
            $table->foreignId('ebook_id')->constrained('ebooks');
            $table->string('name')->nullable(false);
            $table->string('profile_image')->nullable(false);
            $table->integer('main_character')->nullable(false)->default(0);
            $table->string('appearance_desc')->nullable(false);
            $table->string('personality_desc')->nullable(false);
            $table->string('accomplishment_desc')->nullable(false);
            $table->string('who_stops_desc')->nullable(false);
            $table->string('what_if_fails_desc')->nullable(false);
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
