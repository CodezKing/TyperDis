<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CreditsResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
    return [
      'login_id'=>$this->login_id, 
      'email'=>$this->email,
      'password'=>$this->password,
      'created_at' => $this->created_at,
      'deleted_at' => $this->deleted_at,
      'user' => UserResource::collection($this->whenLoaded('User')),
      'credits' => CreditsResource::collection($this->whenLoaded('Credits')),
      'Document' => DocumentResource::collection($this->whenLoaded('Document')),
    ];
}
}