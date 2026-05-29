<?php

namespace App\Http\Resources;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
        'user_id' => $this->document_id,
        'Document_name' => $this->document_name,
        'created_at' => $this->created_at,
        'deleted_at' => $this->deleted_at,
        'User'=>UserResource::collection($this->whenLoaded('User')),

    ];
}
}
