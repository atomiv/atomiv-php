<?php


namespace App\Services\Interfaces;


use App\Services\Dto\CreateOrderRequestDto;
use App\Services\Dto\CreateOrderResponseDto;
use App\Services\Dto\UpdateOrderRequestDto;
use App\Services\Dto\UpdateOrderResponseDto;

interface OrderServiceInterface
{
    public function getOrder(int $id);

    public function getAllOrders();

    public function add(CreateOrderRequestDto $request): CreateOrderResponseDto;

    public function update(UpdateOrderRequestDto $request, int $id): UpdateOrderResponseDto;

    public function remove(int $id);
}