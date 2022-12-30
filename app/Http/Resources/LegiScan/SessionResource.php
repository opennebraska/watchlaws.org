<?php

namespace App\Http\Resources\LegiScan;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function toArray($request)
    {
        return [

            'session_id'    => $this->session_id,
            'state'         => $this->state,
            'year_start'    => $this->year_start,
            'year_end'      => $this->year_end,
            'prefile'       => $this->prefile,
            'sine_die'      => $this->sine_die,
            'prior'         => $this->prior,
            'special'       => $this->special,
            'session_name'  => $this->session_name,
            'session_title' => $this->session_title,
            'session_tag'   => $this->session_tag,
            'import_date'   => $this->import_date,
            'import_hash'   => $this->import_hash,

        ];
    }
}
