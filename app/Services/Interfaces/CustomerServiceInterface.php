<?php


namespace App\Services\Interfaces;


use App\Services\Dto\CreateCustomerRequestDto;
use App\Services\Dto\UpdateCustomerRequestDto;

interface CustomerServiceInterface
{
    public function getCustomer(int $id);

    public function getAllCustomers();

    public function insert(CreateCustomerRequestDto $request);

    public function update(UpdateCustomerRequestDto $request,int $id);

    public function delete(int $id);
}