<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemsResource extends JsonResource
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
            'id' => $this->getId(),
            'productId' => $this->getProductId(),
            'productCode' => $this->getProductCode(),
            'productPrice' => $this->getProductPrice(),
            'quantity' => $this->getQuantity()
        ];
    }
}
