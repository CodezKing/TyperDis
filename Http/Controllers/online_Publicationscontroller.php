<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\online_publication;
use App\Http\Resources\online_PublicationResource;

class online_Publicationscontroller
{

    public function index()
    {
    $Publishings = online_publication::with(['site_ID','Document'])->paginate(10);
    return online_PublicationResource::collection('publishings');
    }
}


