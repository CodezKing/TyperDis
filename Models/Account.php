<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $fillable = [
        'email',
        'password',
        'user',
    ];

    public function user(){
        return $this->hasOne(User::class,'email','user_id');
    }
}
