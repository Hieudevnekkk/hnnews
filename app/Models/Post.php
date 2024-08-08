<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'sub_title',
        'image',
        'content',
        'name_author',
        'views',
        'is_active',
        'is_hot',
        'is_featured',
        'is_most_popular',
        'is_trending'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_hot' => 'boolean',
        'is_featured' => 'boolean',
        'is_most_popular' => 'boolean',
        'is_trending' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
