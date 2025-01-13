<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'service_id',
        'arrival_date',
        'landing_time',
        'flight_number',
        'number_of_people',
        'vehicle',
        'destination_hotel',
        'email',
        'mobile_number',
        'return_transfer',
        'sim_card',
        'sim_card_option',
        'sim_card_g',
        'message',
    ];
}
