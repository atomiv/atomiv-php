<?php


namespace App\Repository\Interfaces;

use App\Entities\OrderItem;

interface OrderItemRepositoryInterface
{
    public function find(int $id): ?OrderItem;

    public function insert(OrderItem $orderItem): OrderItem;

    public function update(OrderItem $orderItem): ?OrderItem;

}