<?php

namespace App\Http\Resources\LegiScan;

use App\Models\LegiScan\Session;
use App\Models\LegiScan\State;
use Illuminate\Http\Resources\Json\JsonResource;

class BillDetailResource extends JsonResource
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

            // // Primary metadata
            // 'bill_number' => $this->bill_number,
            // 'bill_id' => $this->bill_id,
            // 'bill_type' => $this->bill_type,
            // 'updated' => $this->updated,
            // 'created' => $this->created,

            // // Where
            // 'state' => $this->state,
            // 'session' => new SessionResource($this->session),
            // 'body' => new BodyResource($this->body),
            // 'current_body' => new BodyResource($this->current_body),
            // 'pending_committee' => $this->pending_committee,

            // // Situation
            // 'status_id' => $this->status_id,  // 'status' => $this->status,
            // 'status_date' => $this->status_date,

            // //


            // // Content
            // 'title' => $this->title,
            // 'description' => $this->description,

            // // Secondary metadata
            // 'state_url' => $this->state_url,
            // 'legiscan_url' => $this->legiscan_url,
            // 'change_hash' => $this->change_hash,

            // 'ammendments' => JsonResource::collection($this->ammendments),
            // 'calendar_dates' => JsonResource::collection($this->calendar_dates),
            // 'history_items' => $this->history_items,
            // 'progress' => $this->progress,
            // 'reasons' => $this->reasons,
            // 'referrals' => $this->referrals,
            // // 'sast_items' => $this->sast_items,
            // // 'sponsors' => $this->sponsors,
            // // 'subjects' => $this->subjects,
            // // 'supplements' => $this->supplements,
            // // 'texts' => $this->texts,
            // 'views' => $this->views,
            'votes' => BillVoteResource::collection($this->votes),
        ];
    }
}
