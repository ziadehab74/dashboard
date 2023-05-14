<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AiResourceReview extends JsonResource
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
            'id'=>$this->id,
            'Avarege_Score'=>$this->reviewHotel->avg('rate'),
            'hotel_name'=>$this->hotel_name,
            // 'hotel_Manager'=>$this->hotelManager,
            // 'city_id'=>$this->city_id,
            // 'type_of_room'=>$this->type_of_room,
            'Hotel_Address'=>$this->location[0],
            // 'images'=>$this->images,
            // 'options'=>$this->OPTIONS,
            // 'room'=>$this->room,

        ];
    }
}
