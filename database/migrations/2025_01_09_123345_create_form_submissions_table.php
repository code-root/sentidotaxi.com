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
            $table->string('anreise_datum');
            $table->string('landezeit');
            $table->string('flugnr');
            $table->integer('anzahl_personen');
            $table->string('fahrzeug');
            $table->string('zielort_hotel');
            $table->string('email');
            $table->string('mobil_nr');
            $table->text('rucktransfer')->nullable();
            $table->string('sim_karte')->nullable();
            $table->string('sim_karte_option')->nullable();
            $table->string('sim_karte_g')->nullable();
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
