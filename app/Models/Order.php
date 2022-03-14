<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';

    protected $fillable=[
        'adres',
        'desc',
        'user',
        'photo_start',
        'photo_end',
        'com',
        'cats',
        'status'
    ];
}
