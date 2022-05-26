<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderItemsResource;
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->getId(),
            'customerId' => $this->getCustomerId(),
            'orderDate' => $this->getOrderDate(),
            'orderItems' => OrderItemsResource::collection($this->getOrderItems())
        ];
    }
}
