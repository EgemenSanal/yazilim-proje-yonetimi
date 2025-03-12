<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Book extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory,HasApiTokens,Notifiable;

    protected $fillable = [
        'title',
        'author',
        'description',
        'publisher',
        'year',
        'age_limit',
        'cover_image_path',
        'pdf_file_path',
    ];


}
