<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Page extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'author'
    ];
}
