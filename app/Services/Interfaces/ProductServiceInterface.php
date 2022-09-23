<?php


namespace App\Services\Interfaces;


use App\Services\Dto\CreateProductRequestDto;
use App\Services\Dto\CreateProductResponseDto;
use App\Services\Dto\UpdateProductRequestDto;
use App\Services\Dto\UpdateProductResponseDto;

interface ProductServiceInterface
{
    public function getProduct(int $id);

    public function getAllProducts();

    public function add(CreateProductRequestDto $request): CreateProductResponseDto;

    public function update(UpdateProductRequestDto $request, int $id):  UpdateProductResponseDto;

    public function remove(int $id): void;
}