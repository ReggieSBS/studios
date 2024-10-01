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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ebook_id')->constrained('ebooks')->references("id")
            ->on("chapters")->onDelete("cascade");
            $table->foreignId('user_id')->constrained('users')->references("id")
            ->on("movies")->onDelete("cascade");
            $table->string('name')->nullable(false);
            $table->string('genre')->nullable(false);
            $table->string('movie_image')->nullable(true);
            $table->string('movie_trailer')->nullable(true);
            $table->double('price')->nullable(false)->default(0);
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
        Schema::dropIfExists('movies');
    }
};
