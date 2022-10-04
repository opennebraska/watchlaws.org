<?php

namespace App\Http\Resources\LegiScan;

use Illuminate\Http\Resources\Json\JsonResource;

class BodyResource extends JsonResource
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request)
    {
        return [
            'body_id'        => $this->body_id,
            'state'          => $this->state,
            'role'           => $this->role,
            'body_abbr'      => $this->body_abbr,
            'body_short'     => $this->body_short,
            'body_name'      => $this->body_name,
            'body_role_abbr' => $this->body_role_abbr,
            'body_role_name' => $this->body_role_name,
        ];
    }
}
