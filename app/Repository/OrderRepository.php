<?php

namespace App\Repository;

use App\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository
{
    private $orderModel;

    public function __construct(Order $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    public function find(int $id): ?Model
    {
        return $this->orderModel->with('orderItems')->find($id);
    }

    public function all(): ?Collection
    {
      return $this->orderModel->with('orderItems')->get();
    }

    public function insert($order): ?Model
    {
       $order->save();

       return $order;
    }

    public function update(int $id, array $order): ?bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): ?bool
    {
        return $this->orderModel->destroy($id);

    }

}
