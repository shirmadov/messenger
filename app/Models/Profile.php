<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    public $timestamps = false;

    const NOT_SPECIFIED = 0;
    const MAN = 1;
    const WOMAN = 2;

    protected $fillable = [
        'user_id', 'fio','date_birthday', 'phone_number', 'description',
    ];
}
