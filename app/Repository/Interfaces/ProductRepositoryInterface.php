<?php


namespace App\Repository\Interfaces;

use App\Entities\Product;

interface ProductRepositoryInterface
{
    public function find(int $id): ?Product;

    public function all();

    public function insert(Product $product) : Product;

    public function update(Product $product) : Product;

    public function delete(Product $product): bool;

}