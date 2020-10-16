<?php


namespace App\Repository;

use App\Repository\Interfaces\BaseRepository;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements BaseRepository
{
    private $productModel;

    public function __construct(Product $productModel){
        $this->productModel = $productModel;
    }

    public function find(int $id): ?Model
    {
       return $this->productModel->find($id);
    }

    public function all(): ?Collection
    {
        return $this->productModel->all();
    }

    public function save(array $attributes): ?Model
    {
        return $this->productModel->create($attributes);
    }

    public function update(int $id, array $attributes): ?bool
    {
        return $this->productModel->whereId($id)->update($attributes);
    }

    public function delete(int $id): ?bool
    {
        return $this->productModel->destroy($id);
    }

}
