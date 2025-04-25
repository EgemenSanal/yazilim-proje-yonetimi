<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Advert extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdvertFactory> */
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable=[
        'title',
        'description',
        'price',
        'profession',
        'location',
        'lesson',
        'video_path'
        ];
}
