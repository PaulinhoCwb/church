<?php

namespace App\Http\Resources;

use App\Http\Resources\Dependents;
use Illuminate\Http\Resources\Json\JsonResource;

class Person extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'dateofbirth' => $this->dateofbirth,
            'birthplace' => $this->birthplace,
            'zipcode' => $this->zipcode,
            'address' => $this->address,
            'number' => $this->number,
            'email' => $this->email,
            'tellphone' => $this->tellphone,
            'cellphone' => $this->cellphone,
            'publicplace' => $this->publicplace,
            'dependents' => new Dependents($this->dependents)
        ];
    }
}
