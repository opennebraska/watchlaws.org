<?php

namespace App\Http\Resources\LegiScan;

use App\Models\LegiScan\State;
use App\Models\LegiScan\Session;
use Illuminate\Http\Resources\Json\JsonResource;

class BillDetailResource extends JsonResource
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request)
    {
        return [
            'votes' => BillVoteResource::collection($this->votes),
        ];
    }
}
