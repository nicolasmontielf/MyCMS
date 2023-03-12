<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'cta',
        'cta_url',
        'image',
        'image_responsive',
        'active',
        'start_date',
        'end_date',
    ];
}
