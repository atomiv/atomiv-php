<?php


namespace App\Repository\Interfaces;

use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProductRepositoryInterface
{
    public function find(int $id): Model;

    public function all(): Collection;

    public function insert(Product $product): Model;

    public function update(Product $product): ?Model;

    public function delete(int $id): bool;

}