<?php


namespace App\Repository\Interfaces;

use App\Records\OrderItemRecord;

interface OrderItemRepositoryInterface
{
    public function find(int $id): ?OrderItemRecord;

    public function insert(OrderItemRecord $orderItem): OrderItemRecord;

    public function update(OrderItemRecord $orderItem): ?OrderItemRecord;

}