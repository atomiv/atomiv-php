<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customerId' => $this->customer_id,
            'orderDate' => $this->order_date,
            'orderItems' => OrderItemsResource::collection($this->orderItems)
        ];
    }
}
