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
            $table->foreignId('user_id')->constrained('users')->references("id")
            ->on("user_subscriptions");
            $table->integer('licence_id')->nullable(false)->default(0);
            $table->integer('high_risk')->nullable(false)->default(0);
            $table->integer('disabled')->nullable(false)->default(0);
            $table->date('disable_date')->nullable(true);
            $table->date('accepted');
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
