<?php


namespace App\Repository\Interfaces;

use App\Entities\Order;

interface OrderRepositoryInterface
{

    public function find(int $id): Order;

    public function all();

    public function insert(Order $order): Order;

    public function delete(Order $order): bool;

}