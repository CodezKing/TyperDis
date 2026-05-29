<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = [
        'credit',
        'meta_data',
        'user_id',
    ];

    public function user(){
        return $this->hasOne(User::class,'credit','user_id');
    }

    

}