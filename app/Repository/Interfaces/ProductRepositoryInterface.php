<?php


namespace App\Repository\Interfaces;

use App\Entities\Product;
use App\Records\ProductRecord;

interface ProductRepositoryInterface
{
    public function find(int $id): ?ProductRecord;

    public function all(): array;

    public function add(Product $product): void;

    public function update(Product $product): ProductRecord;

    public function remove(Product $product): void;

}