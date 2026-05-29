<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;
use App\Models\Credit_account;
use App\Http\Resources\Credit_accountResource;

class CreditController
{
    public function index(){
    $Credit_account = Credit::with(['user'])->paginate(10);
    return Credit_accountResource::collection($Credit_account);
}
}
