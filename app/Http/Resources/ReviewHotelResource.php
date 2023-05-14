<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewHotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        // return parent::toArray($request);


        return
        [
          "rate"=> $this->rate,
         "comment"=>$this->comments,
         "userInfo"=>$this->user,
         "hotelInfo"=>$this->hotelInfo,
         "created_at"=>$this->created_at,
        ]
    ;
    }
}
