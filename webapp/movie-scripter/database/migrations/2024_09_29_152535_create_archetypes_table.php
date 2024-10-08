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
        Schema::create('archetypes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->references("id")
            ->on("acts");
            $table->integer('character_id')->nullable(false)->default(0);
            $table->string('archetype_name')->nullable(false);
            $table->integer('act_id')->nullable(false);
            $table->string('answer')->nullable(false);
            $table->integer('closer_to_goal')->nullable(false)->default(1);
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
        Schema::dropIfExists('archetypes');
    }
};
