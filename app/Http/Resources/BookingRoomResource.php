<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingRoomResource extends JsonResource
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
            "hotelInfo"=>$this->hotel,
            "userInfo"=>$this->user,
            'roomInfo'=>$this->room,
            'num_of_nights'=>$this->num_of_nights,
            'num_of_guests'=>$this->num_of_guests,
            'total_price'=>$this->total_price,
            'check_in'=>$this->check_in,
            'check_out'=>$this->check_out,
            'status'=>$this->status,
            'payment_status'=>$this->payment_status,
            'payment_method'=>$this->payment_method,

        ];
    }
}
