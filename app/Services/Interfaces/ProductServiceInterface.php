<?php


namespace App\Services\Interfaces;


use App\Services\Dto\CreateProductRequestDto;
use App\Services\Dto\UpdateProductRequestDto;

interface ProductServiceInterface
{
    public function getProduct(int $id);

    public function getAllProducts();

    public function insert(CreateProductRequestDto $request);

    public function update(UpdateProductRequestDto $request, int $id);

    public function delete(int $id);
}