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
        Schema::create('hotel_infos', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('hotel_id')->references('id')->on('hotels');
            $table->text("hotel_name");
            $table->json("images");
            $table->json("location");
            $table->json("OPTIONS");
            $table->String("type_of_room");
            $table->softDeletes();

            $table->foreignId("city_id")->constrained("cities")->cascadeOnDelete();
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
        Schema::dropIfExists('hotel_infos');
    }
};
