<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_tag', 'tag_id', 'post_id');
    }
}
