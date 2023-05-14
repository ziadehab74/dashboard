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
        Schema::create('user__intersteds', function (Blueprint $table)
        {
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('categoryId');
            $table->primary(['userID', 'categoryId']);
            $table->foreign("userID")->references(
                "id"
            )->on("users");
            $table->foreign("categoryId")->references(
                "id"
            )->on("categories");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user__intersteds');
    }
};
