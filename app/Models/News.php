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
}
