<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class Member extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory,HasApiTokens,Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'age'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
