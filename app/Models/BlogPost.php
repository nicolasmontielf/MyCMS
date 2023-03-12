<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'subtitle',
        'slug',
        'body',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tag', 'post_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
