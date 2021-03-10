<?php

namespace App\Repository;

use App\Order;
use App\Repository\Interfaces\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements OrderRepositoryInterface
{
    private $orderModel;

    public function __construct(Order $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    public function find(int $id): Model
    {
        return $this->orderModel->with('orderItems')->find($id);
    }

    public function all(): Collection
    {
      return $this->orderModel->with('orderItems')->get();
    }

    public function insert($order): Model
    {
       $order->save();

       return $order;
    }

    public function delete(int $id): bool
    {
        return $this->orderModel->destroy($id);

    }

}
