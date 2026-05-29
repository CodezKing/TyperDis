<?php

namespace App\Http\Resources;

use App\Models\Blog_site;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PublishingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'publishing_id'=>$this->id,
            'site_name'=>$this->site_name,
            'document_name'=>$this->document_name,
            'Author_Firstname'=>$this->author_Firstname,
            'Author_Lastname'=>$this->author_Lastname,
            'publication_Date'=>$this->publication_Date,
            'Document'=>DocumentResource::collection($this->whenLoaded('document_id')),
        ];
    }
}
