<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'description', 'image_url'];

    public function categories()
    {
        return $this->hasMany(ServiceCategory::class);
    }
}
