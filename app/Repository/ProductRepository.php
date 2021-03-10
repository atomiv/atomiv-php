<?php


namespace App\Repository;

use App\Product;
use App\Repository\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ProductRepositoryInterface
{
    private $productModel;

    public function __construct(Product $productModel){
        $this->productModel = $productModel;
    }

    public function find(int $id): Model
    {
       return $this->productModel->find($id);
    }

    public function all(): Collection
    {
        return $this->productModel->all();
    }

    public function insert(Product $product): Model
    {
        $product->save();

        return $product;
    }

    public function update(Product $product): Model
    {
       $product->save();

       return $product;
    }

    public function delete(int $id): bool
    {
        return $this->productModel->destroy($id);
    }

}
