<?php


namespace App\Repository\Interfaces;

use App\Records\OrderRecord;

interface OrderRepositoryInterface
{

    public function find(int $id): OrderRecord;

    public function all();

    public function insert(OrderRecord $order): OrderRecord;

    public function delete(OrderRecord $order): bool;

}