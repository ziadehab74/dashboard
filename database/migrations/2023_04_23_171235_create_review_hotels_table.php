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
        Schema::create('review_hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId("Hotel_id")->constrained("hotel_infos");
            $table->foreignId("userID_id")->constrained("users");
            $table->integer("rate");
            $table->text("comments");
            $table->softDeletes();

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
        Schema::dropIfExists('review_hotels');
    }
};
