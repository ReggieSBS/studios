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
        Schema::create('plot_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->references("id")->on("acts")->onDelete("cascade");
            $table->integer('plot_id')->constrained('plots')->references("id")->on("plot_roles");
            $table->integer('character_id')->nullable(false)->default(0);
            $table->string('archetype')->nullable(false)->default(0);
            $table->string('role_desc')->nullable(false);
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
        Schema::dropIfExists('plot_roles');
    }
};
