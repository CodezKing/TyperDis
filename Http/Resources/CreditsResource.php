<?php

namespace App\Http\Resources;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
        'credit_id' => $this->credit_id,
        'credit' => $this->credit,
        
    ];
}
}