<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Member extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = [
        'first_name',
        'last_name',
        'social_security_number',
        'email_address',
        'phone_number',
        'street_address',
        'zip_code',
        'city',
        'newsletter'
    ];
}
