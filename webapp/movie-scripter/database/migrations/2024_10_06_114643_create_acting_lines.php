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
        Schema::create('acting_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->references("id")->on("acts")->onDelete("cascade");
            $table->integer('plot_id')->constrained('plots')->references("id")->on("acting_lines");
            $table->string('character')->nullable(false)->default(0);
            $table->longText('line')->nullable(true);
            $table->integer('sort')->default(0);
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
        Schema::dropIfExists('acting_lines');
    }
};
