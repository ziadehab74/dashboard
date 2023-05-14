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
        Schema::create('booked_activities', function
        (Blueprint $table)
        {
            $table->id();
            $table->foreignId("activity_id")->constrained("activities");
            $table->foreignId("user_id")->constrained("users");
            $table->integer("number_of_people");
            $table->timestamp("date");
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
        Schema::dropIfExists('booked_activities');
    }
};
