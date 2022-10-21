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
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property_name');
            $table->bigInteger('categoryid')->unsigned()->index();  
            $table->bigInteger('owner')->unsigned()->index();
            $table->integer('no_of_rooms');
            $table->integer('no_of_bathrooms');
            $table->string('cover_img')->nullable();
            $table->string('location');
            $table->string('status');

            $table->timestamps();

            $table->foreign('categoryid')
            ->references('category_id')->on('categories')->onDelete('cascade');

            $table->foreign('owner')
            ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};
