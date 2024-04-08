<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssociationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'card_number' => $this->card_number,
            'card_name' => $this->cardName,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'number' => $this->customer_number,
            'point' => $this->point,

        ];
    }
}
