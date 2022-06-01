<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('location_of_incident')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('incident_type')->nullable();
            $table->string('comment_recommendation')->nullable();
            $table->string('sticker')->nullable();
            $table->string('type_of_vehicle')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
            $table->dateTime('created_at');
            $table->bigInteger('created_by')->nullable()->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('updated_at');
            $table->bigInteger('updated_by')->nullable()->unsigned();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->string('external_phone_number')->nullable();
            $table->string('external_created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
