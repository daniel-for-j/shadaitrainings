<?php

// app/CustomUser.php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'qualification', 'date_of_birth',
    ];
    protected $table = 'users';

}
