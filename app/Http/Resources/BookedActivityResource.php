<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookedActivityResource extends JsonResource
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
            "activity"=>$this->activity,
            "user"=>$this->user,
            "date"=>$this->date,
            "number_of_people"=>$this->number_of_people,
            "created_at"=>$this->created_at
        ];
    }
}
