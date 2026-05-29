<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'document_id',
        'meta_data',
        'user_id',
        'font_id',
    ];

    public function user() {
        return $this->hasOne(User::class,'document_id','user_id');
    }

    public function font() {
        return $this->hasMany(Font::class,'document_id','font_id');
    }
}
