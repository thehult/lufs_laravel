<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;


class MemberRegistration extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = [
        'member_id',
        'year'
    ];


    public function member() {
        this->belongsTo(Member::class);
    }

}
