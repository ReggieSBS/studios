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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ebook_id')->constrained('ebooks')->references("id")
            ->on("chapters")->onDelete("cascade");
            $table->integer('chapter_number')->nullable(false);
            $table->string('title')->nullable(true);
            $table->string('summery')->nullable(true);
            $table->longText('content')->nullable(true);
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
        Schema::dropIfExists('chapters');
    }
};
