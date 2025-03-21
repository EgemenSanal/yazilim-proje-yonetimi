<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    /** @use HasFactory<\Database\Factories\AdvertFactory> */
    use HasFactory;
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
