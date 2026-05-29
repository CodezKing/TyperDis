<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publishings extends Model
{
    protected $fillable = [
    'site_id',
    'site_name',
    'document_name',
    'author_firstName',
    'author_lastName',
    'meta_data',
    'user',
    ];

    public function Document(){
        return $this->hasOne(User::class,'publication_id','document_id');
    }

    public function Reader(){
        return $this->hasOne(User::class,'publication_id','reader_id');
    }
}
