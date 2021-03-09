<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Audit extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'user_type'=> $this->user_type,
            'event' => $this->event,
            'auditable_type' => $this->auditable_type,
            'old_values' => $this->old_values,
            'new_values' => $this->new_values,
            'updated_at' => $this->updated_at,
        ];
    }
}
