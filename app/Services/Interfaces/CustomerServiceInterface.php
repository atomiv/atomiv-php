<?php


namespace App\Services\Interfaces;


use App\Services\Dto\CreateCustomerRequestDto;
use App\Services\Dto\CreateCustomerResponseDto;
use App\Services\Dto\UpdateCustomerRequestDto;
use App\Services\Dto\UpdateCustomerResponseDto;

interface CustomerServiceInterface
{
    public function getCustomer(int $id);

    public function getAllCustomers();

    public function add(CreateCustomerRequestDto $request): CreateCustomerResponseDto;

    public function update(UpdateCustomerRequestDto $request,int $id): UpdateCustomerResponseDto;

    public function remove(int $id): void;
}