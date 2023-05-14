<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInterstedResource extends JsonResource
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
                "user_id"=> $this->user->id,
                "user_name"=> $this->user->name,
                "intersted_id"=> $this->intersted->id,
                "category"=> $this->intersted->name,
        ];
    }
}
// return [
//     "userInfo"=>[
//         "user_id"=> $this->user->id,
//         "user_name"=> $this->user->name,
//     ],
//     "intersted"=>[
//         "intersted_id"=> $this->intersted->id,
//         "intersted_name"=> $this->intersted->intersted_name,
//     ],
// ];
