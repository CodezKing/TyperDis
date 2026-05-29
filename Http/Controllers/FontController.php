<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Font;
use App\Http\Resources\FontResource;

class FontController
{
    public function index()
    {
    $Font = Font::with(['Document','font'])->paginate(10);
    return FontResource::collection([$Font]);
}
}
