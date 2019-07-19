<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Dependent extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        // dd($request->name);
        return parent::toArray($request);
        // return [
        //     'name' => $this->name,
        //     'dateofbirth' => $this->dateofbirth,
        //     'weddingdata' => $this->weddingdata,
        //     'husband' => new Person($this->people)
        // ];
    }
}
