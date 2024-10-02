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
            $table->foreignId('user_id')->constrained('users')->references("id")
            ->on("ebooks")->onDelete("cascade");
            $table->string('name')->nullable(false);
            $table->string('file')->nullable(false);
            $table->string('image')->nullable(true);
            $table->string('overview_text')->nullable(true);
            $table->string('author')->nullable(true);
            $table->string('publisher')->nullable(true);
            $table->date('publish_date')->nullable(true);
            $table->integer('active')->nullable(false)->default(0);
            $table->integer('converted')->nullable(false)->default(0);
            $table->integer('completion')->nullable(false)->default(0);
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
