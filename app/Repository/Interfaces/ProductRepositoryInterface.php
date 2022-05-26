<?php


namespace App\Repository\Interfaces;

use App\Records\ProductRecord;

interface ProductRepositoryInterface
{
    public function find(int $id): ?ProductRecord;

    public function all();

    public function insert(ProductRecord $product) : ProductRecord;

    public function update(ProductRecord $product) : ProductRecord;

    public function delete(ProductRecord $product): bool;

}