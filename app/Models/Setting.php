<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'value',
        'page',
        'slug',
        'title',
    ];


    public static function getLogoSettings()
    {
        // return Cache::remember('basic_settings', 3600, function () {
            return '/storage/app/' . self::where('type', 'basic')
                ->where('slug', 'logo')
                ->value('value') ?? 'images/default-logo.png';
        // });
    }
}
