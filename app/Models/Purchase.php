<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Purchase extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\PurchaseFactory> */
    use HasFactory,HasApiTokens,Notifiable;

    protected $fillable = [
        'course_id',
        'member_id'
    ];
    public function course()
    {
        return $this->belongsTo(Advert::class, 'course_id');
    }
}
