<?php


namespace App\Services\Interfaces;


use App\Services\Dto\CreateOrderRequestDto;
use App\Services\Dto\UpdateOrderRequestDto;

interface OrderServiceInterface
{
    public function getOrder(int $id);

    public function getAllOrders();

    public function insert(CreateOrderRequestDto $request);

    public function update(UpdateOrderRequestDto $request, int $id);

    public function delete(int $id);
}