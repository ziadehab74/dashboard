<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return
        [
            "id"=>$this->id,
            "hotelInfo"=>$this->hotles,
            "numnberOfBeds"=>$this->numnberOfBeds,
            "booked"=>$this->booked==0 ?false : true,
            "priceperDay"=>$this->priceperDay,
            "descripions"=>$this->descripions,
            "images"=>$this->images,
        ];
    }
}
