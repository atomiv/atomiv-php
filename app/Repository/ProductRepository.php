<?php


namespace App\Repository;

use App\Repository\Interfaces\BaseRepository;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository
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

    public function insert($product): ?Model
    {
        $product->save();

        return $product;
    }

    public function update(int $id, array $product): ?bool
    {
        return $this->productModel->whereId($id)->update($product);
    }

    public function delete(int $id): ?bool
    {
        return $this->productModel->destroy($id);
    }

}
