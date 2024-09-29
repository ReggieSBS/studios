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
            $table->foreignId('plot_id')->constrained('plots');
            $table->foreignId('character_id')->constrained('characters');
            $table->integer('number')->nullable(false)->default(0);
            $table->string('answer')->nullable(false);
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
