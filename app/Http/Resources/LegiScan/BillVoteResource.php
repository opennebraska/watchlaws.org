<?php

namespace App\Http\Resources\LegiScan;

use Illuminate\Http\Resources\Json\JsonResource;

class BillVoteResource extends JsonResource
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request)
    {
        return [
            'roll_call_id'   => $this->roll_call_id,
            'bill_id'        => $this->bill_id,
            'roll_call_body' => new BodyResource($this->roll_call_body),
            'roll_call_date' => $this->roll_call_date,
            'roll_call_desc' => $this->roll_call_desc,
            'yea'            => $this->yea,
            'nea'            => $this->nea,
            'nv'             => $this->nv,
            'absent'         => $this->absent,
            'total'          => $this->total,
            'passed'         => $this->passed,
            'legiscan_url'   => $this->legiscan_url,
            'state_url'      => $this->state_url,
            'updated'        => $this->updated,
            'created'        => $this->created,
            'details'        => BillVoteDetailsResource::collection($this->details),
        ];
    }
}
