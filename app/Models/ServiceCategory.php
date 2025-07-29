<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = ['service_id', 'name', 'description'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function photos()
    {
        return $this->hasMany(ServicePhoto::class);
    }
}
