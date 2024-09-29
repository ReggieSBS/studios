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
        Schema::create('media_library', function (Blueprint $table) {
            $table->id();
            $table->integer('act_id')->nullable(true)->default('NULL');
            $table->integer('plot_id')->nullable(true)->default('NULL');
            $table->integer('archetype_id')->nullable(true)->default('NULL');
            $table->integer('character_id')->nullable(true)->default('NULL');
            $table->integer('chapter_id')->nullable(true)->default('NULL');
            $table->integer('page_id')->nullable(true)->default('NULL');
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
        Schema::dropIfExists('media_library');
    }
};
