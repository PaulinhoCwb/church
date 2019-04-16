<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class News extends JsonResource 
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return arrays
     */
    public function toArray($request)
    {
        // return parent::toArray($request); 
        return [
            'id' => $this->id,
            'tipo' => $this->tipo,
            'titulo' => $this->titulo,
            'body' => $this->body,
            'user' => new UserResource($this->user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
