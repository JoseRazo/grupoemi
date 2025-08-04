<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        // Información general
        'company_name',
        'about_us',
        'mission',
        'vision',

        // Contacto
        'phone',
        'whatsapp',
        'email',
        'address',
        'google_maps_link',

        // Redes sociales
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'tiktok',

        // Otros
        'logo_url',
    ];
}
