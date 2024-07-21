<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealPlanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return[
            'id' => $this->id,
            'name' => $this->name,
            'ingredient' => $this->ingredient,
            'type' => $this->type,
            'day' => $this->day,
            'week' => $this->week,
            'status' => $this->status,
            'image' => $this->image,
            'calories' => $this->calories,
            'subscription_id' => $this->subscription_id,
        ];
    }
}
