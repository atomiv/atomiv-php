<?php


namespace App\Repository\Interfaces;

use App\Entities\Order;
use App\Records\OrderRecord;

interface OrderRepositoryInterface
{

    public function find(int $id): ?OrderRecord;

    public function all(): array;

    public function add(Order $order): void;

    public function remove(Order $order): void;

}