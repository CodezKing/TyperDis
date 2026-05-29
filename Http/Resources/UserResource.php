<?php

namespace App\Http\Resources;

use App\Models\Document;
use App\Models\Publishings;
use App\Models\Navigation;
use App\Models\LoginPage;
use App\Http\Resources\NavigationResource;
use App\Http\Resources\LoginPageResource;
use App\Http\Resources\Credit_accountResource;
use App\Http\Resources\PublishingsResource;
use App\Http\Resources\DocumentResource;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'user_id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
            'Account'=>AccountResource::collection($this->whenLoaded('LoginPage')),
            'Credit_account'=>Credit_accountResource::collection($this->whenLoaded('Credit account')),
            'Publishings'=>PublishingsResource::collection($this->whenLoaded('Publishings')),
            'Document'=>DocumentResource::collection($this->whenLoaded('Document')),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];

        return parent::toArray($request);
    }
}
