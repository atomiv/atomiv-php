<?php

namespace App\Repository;

use App\Repository\Interfaces\BaseRepository;
use App\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements BaseRepository
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

    public function save(array $attributes): ?Model
    {
       return $this->orderModel->create(['customer_id'=>$attributes['customer_id'],'order_date'=>now()]);

    }

    public function update(int $id, array $attributes): ?bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): ?bool
    {
        return $this->orderModel->destroy($id);

    }

}
