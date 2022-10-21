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
        Schema::create('leases', function (Blueprint $table) {
            $table->bigIncrements('lease_id');
            $table->bigInteger('propertyid')->unsigned()->index();
            $table->bigInteger('tenant')->unsigned()->index();
            $table->bigInteger('property_owner')->unsigned()->index();
            $table->string('lease_type');
            $table->string('purpose_for_lease');
            $table->string('no_of_occupants');
            $table->string('parking');
            $table->string('no_of_pets');
            $table->string('lease_status');
            $table->timestamps();

            $table->foreign('tenant')
            ->references('id')->on('users');

            $table->foreign('property_owner')
            ->references('id')->on('users')->onDelete('cascade');

            $table->foreign('propertyid')
            ->references('id')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leases');
    }
};
