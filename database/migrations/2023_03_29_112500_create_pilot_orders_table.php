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
        Schema::create('pilot_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shooting_plan_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->default(0);
            $table->datetime('application_date');
            $table->timestamps();

            $table->foreign('shooting_plan_id')->references('id')->on('shooting_plans')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilot_orders');
    }
};
