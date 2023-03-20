<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Banner extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    protected $casts = [
        'active' => 'boolean',
    ];

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
