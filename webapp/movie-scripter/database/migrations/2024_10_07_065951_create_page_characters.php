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
        Schema::create('page_characters', function (Blueprint $table) {
            $table->id();
            $table->integer('ebook_id')->nullable(true)->default(0);
            $table->integer('page_id')->nullable(true)->default(0);
            $table->integer('character_id')->nullable(true)->default(0);
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
        Schema::dropIfExists('page_characters');
    }
};
