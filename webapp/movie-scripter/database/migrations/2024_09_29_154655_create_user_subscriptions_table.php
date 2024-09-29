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
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('licence_id')->constrained('licences');
            $table->integer('high_risk')->nullable(false)->default(0);
            $table->integer('disabled')->nullable(false)->default(0);
            $table->date('disable_date')->nullable(true);
            $table->string('file_name')->nullable(false);
            $table->string('file')->nullable(false);
            $table->string('file_extension')->nullable(false);
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
        Schema::dropIfExists('user_subscriptions');
    }
};
