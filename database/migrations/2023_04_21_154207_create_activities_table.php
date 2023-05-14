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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->text("activityName");
            $table->double("activityPrice");
            $table->text("description");
            $table->text("openTime");
            $table->text("closeTime");
            $table->json("location");
            $table->json("images");
            $table->softDeletes();
            $table->foreignId('hotel_id')->references('id')->on('hotels');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('city_id')->constrained('cities');

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
        Schema::dropIfExists('activities');
    }
};
