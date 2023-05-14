<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
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
            "id" =>$this->id,
            "activityName" =>$this->activityName,
            "activityPrice" =>$this->activityPrice,
            "description" =>$this->description,
            "openTime" =>$this->openTime,
            "closeTime" =>$this->closeTime,
            "category"=>$this->category,
            "city"=>$this->city,
            'hotel_id'=>$this->hotel,
            "location"=>$this->location,
            "images"=>$this->images,
            "review"=>ReviewResource::collection($this->review),

        ];
    }
}
