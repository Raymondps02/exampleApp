<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
    ];
    protected $table = 'admin';
    public $timestamps = false;
    protected $hidden = [
        'password',
    ];

    
}
