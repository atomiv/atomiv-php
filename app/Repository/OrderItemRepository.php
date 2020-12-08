<?php


namespace App\Repository;

use App\Repository\Interfaces\BaseRepository;
use App\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderItemRepository implements BaseRepository
{
    private $orderItemModel;

    public function __construct(OrderItem $orderItemModel, ProductRepository $productRepo)
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

    public function insert(array $attributes): ?Model
    {
        // TODO: Implement save() method.
    }

    public function update(int $id, array $attributes): ?bool
    {
       return $this->orderItemModel->whereId($id)->update($attributes);
    }

    public function delete(int $id): ?bool
    {
        return $this->orderItemModel->destroy($id);
    }

    public function insertMany(array $attributes): ?bool{

        return $this->orderItemModel->insert($attributes);
    }

    public function deleteMany($ids): ?bool
    {
        return $this->orderItemModel->destroy($ids);
    }

}
