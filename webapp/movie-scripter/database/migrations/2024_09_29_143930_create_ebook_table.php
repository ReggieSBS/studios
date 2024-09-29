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
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('file')->nullable(false);
            $table->string('image')->nullable(true);
            $table->string('overview_text')->nullable(true);
            $table->string('author')->nullable(true);
            $table->string('publisher')->nullable(true);
            $table->date('publish_date')->nullable(true);
            $table->foreignId('userid')->constrained('users');
            $table->id();
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
        Schema::dropIfExists('ebook');
    }
};
