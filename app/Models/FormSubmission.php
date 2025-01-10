<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'anreise_datum',
        'landezeit',
        'flugnr',
        'anzahl_personen',
        'fahrzeug',
        'zielort_hotel',
        'email',
        'mobil_nr',
        'rucktransfer',
        'sim_karte',
        'sim_karte_option',
        'sim_karte_g',
        'message',
    ];
}
