<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('service_id');
            $table->string('arrival_date');
            $table->string('landing_time');
            $table->string('flight_number');
            $table->integer('number_of_people');
            $table->string('vehicle');
            $table->string('destination_hotel');
            $table->string('email');
            $table->string('mobile_number');
            $table->text('return_transfer')->nullable();
            $table->string('sim_card')->nullable();
            $table->string('sim_card_option')->nullable();
            $table->string('sim_card_g')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
    }
};
