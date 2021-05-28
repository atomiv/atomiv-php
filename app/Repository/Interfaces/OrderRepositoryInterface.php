<?php


namespace App\Repository\Interfaces;

use App\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{

    public function find(int $id): Model;

    public function all(): Collection;

    public function insert(Order $order): Model;

    public function delete(int $id): bool;

}