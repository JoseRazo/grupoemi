<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'slider_category_id',
        'title',
        'subtitle',
        'image',
        'button1_text',
        'button1_href',
        'button2_text',
        'button2_href',
        'order',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(SliderCategory::class, 'slider_category_id');
    }
}
