<?php


namespace App\Repository;

use App\Repository\Interfaces\BaseRepository;
use App\OrderItem;
use Illuminate\Database\Eloquent\Collection;
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

    public function all(): ?Collection
    {
        // TODO: Implement all() method.
    }

    public function insert(array $orderItem): ?Model
    {
        // TODO: Implement save() method.
    }

    public function update(int $id, array $orderItem): ?bool
    {
       return $this->orderItemModel->whereId($id)->update($orderItem);
    }

    public function delete(int $id): ?bool
    {
        return $this->orderItemModel->destroy($id);
    }

    public function insertMany(array $orderItem): ?bool{

        return $this->orderItemModel->insert($orderItem);
    }

    public function deleteMany($ids): ?bool
    {
        return $this->orderItemModel->destroy($ids);
    }

}
