<?php


namespace App\Repository;

use App\OrderItem;
use Illuminate\Database\Eloquent\Model;

class OrderItemRepository
{
    private $orderItemModel;

    public function __construct(OrderItem $orderItemModel)
    {
        $this->orderItemModel = $orderItemModel;
    }

    public function find(int $id): ?Model
    {
        return $this->orderItemModel->find($id);
    }

    public function insert($orderItem): ?Model
    {
       $orderItem->save();

       return $orderItem;
    }

    public function update($orderItem): ?Model
    {
        $orderItem->save();

        return $orderItem;
    }

    public function delete(int $id): ?bool
    {
        return $this->orderItemModel->destroy($id);
    }

    public function deleteMany($ids): ?bool
    {
        return $this->orderItemModel->destroy($ids);
    }

}
