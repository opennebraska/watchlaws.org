<?php

namespace App\Http\Resources\LegiScan;

use Illuminate\Http\Resources\Json\JsonResource;

class BillVoteDetailsResource extends JsonResource
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

        return [
            'roll_call_id' => $this->roll_call_id,
            'person' => $this->person,
            'vote' => $this->vote,
        ];
    }
}
