<?php

namespace App\Http\Repository;

use App\Http\Repository\Interfaces\BaseRepository;
use App\Order;
use App\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements BaseRepository
{
    private $orderModel;
    private $orderItemRepo;

    public function __construct(Order $orderModel, OrderItemRepository $orderItemRepo)
    {
        $this->orderModel = $orderModel;
        $this->orderItemRepo = $orderItemRepo;
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

        $order  = $this->orderModel->create(['customer_id'=>$attributes['customer_id'],'order_date'=>now()]);

        $attributes['order_id'] = $order->id;

        $this->orderItemRepo->saveMany($attributes);

        return $order->load('orderItems');
    }

    public function update(int $id, array $attributes): ?bool
    {
        return $this->orderItemRepo->updateMany($attributes['items']);

    }

    public function delete(int $id): ?bool
    {
        $order = $this->find($id);

        $this->orderItemRepo->deleteMany($order->orderItems->pluck('id'));

       return $order->delete();
    }

}
