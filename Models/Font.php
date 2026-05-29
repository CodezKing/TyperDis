<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    protected $fillable = [
        'font_id',
        'font_name',
        'font_size',
        'font_color',
        'meta_data',
        'document_id',
    ];

    public function Document() {
        return $this->hasMany(Document::class,'font_id','document_id');
    }
}
