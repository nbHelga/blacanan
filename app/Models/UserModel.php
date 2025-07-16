<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Model
{
    use Notifiable;

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
