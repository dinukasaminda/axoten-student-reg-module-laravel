<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = true;

    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
        'user_verified_at' => 'datetime'
    ];

    protected $fillable = [
        'full_name',
        'school_name',
        'subject_stream',
        'exam_year',
        'attempt',
        'closet_town',
        'district',
        'address',
        'nic_no',
        'nic_front',
        'nic_back',
        'email',
        'mobile',
        'del_mobile_1',
        'del_mobile_2'
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
