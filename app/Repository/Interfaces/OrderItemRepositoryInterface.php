<?php


namespace App\Repository\Interfaces;

use App\Entities\OrderItem;
use App\Records\OrderItemRecord;

interface OrderItemRepositoryInterface
{
    public function find(int $id): ?OrderItemRecord;

    public function add(OrderItem $orderItem): void;

    public function update(OrderItem $orderItem): void;

}