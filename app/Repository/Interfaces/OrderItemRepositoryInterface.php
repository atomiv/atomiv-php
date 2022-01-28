<?php


namespace App\Repository\Interfaces;

use App\OrderItem;
use Illuminate\Database\Eloquent\Model;

interface OrderItemRepositoryInterface
{
    public function find(int $id): Model;

    public function insert(OrderItem $orderItem): Model;

    public function update(OrderItem $orderItem): ?Model;

}