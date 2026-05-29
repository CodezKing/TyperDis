<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $fillable = [
        'reader_id',
        'meta_data',
        'blog_site',
    ];

    public function online_publication(){
        return $this->hasOne(Online_publication::class,'reader_id','blog_site id');
    }
}
