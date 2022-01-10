<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class News extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = [
        'title',
        'status',
        'fillable',
        'image',
        'content',
        'featured',
        'category',
        'author',
        'published_at'
    ];

    public function scopeFeatured($query) {
        $time = now('UTC')->subDays(14);
        return $query->where('featured', 1)->whereDate('published_at', '>=', $time)->orderBy('published_at');
    }

    public function scopeLatest($query) {
        return $query->orderBy('published_at');
    }

}
