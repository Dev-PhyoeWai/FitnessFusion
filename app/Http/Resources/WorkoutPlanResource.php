<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutPlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return[
            'id' => $this->id,
            'name' => $this->name,
            'body_part' => $this->body_part,
            'type' => $this->type,
            'day' => $this->day,
            'week' => $this->week,
            'status' => $this->status,
            'set' => $this->set,
            'raps' => $this->raps,
            'image' => $this->image,
            'gender' => $this->gender,
            'subscription_id' => $this->subscription_id,
        ];
    }
}
