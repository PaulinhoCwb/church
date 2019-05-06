<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
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
            'title'       => $this->event,
            'description' => $this->description,
            'color'       => $this->color,
            'start'       => $this->day,
            'end'         => $this->day
        ];
    }
}
