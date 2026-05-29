<?php

namespace App\Http\Resources;

use App\Models\Document;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FontResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
    return [
    'font_id' => $this->font_id,
    'font_name' => $this->font_name,
    'Document' => DocumentResource::collection($this->whenLoaded('Document')),
    ];
}
}