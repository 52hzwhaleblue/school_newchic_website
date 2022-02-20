<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticateable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades;
use App\Models\Address;

class User extends Authenticateable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'username',
        'fullName',
        'email',
        'password',
        'phone',
        'addressID',
        'avatar',
        'status',
    ];

    public function address(){
        return $this->hasMany(Address::class,'id','userID');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}