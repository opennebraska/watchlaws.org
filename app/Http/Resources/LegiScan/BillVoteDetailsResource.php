<?php

namespace App\Http\Resources\LegiScan;

use Illuminate\Http\Resources\Json\JsonResource;

class BillVoteDetailsResource extends JsonResource
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request)
    {
        return [
            'roll_call_id' => $this->roll_call_id,
            'person'       => $this->person,
            'vote'         => $this->vote,
        ];
    }
}
