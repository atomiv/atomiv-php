<?php


namespace App\Repository\Interfaces;

use App\Entities\Customer;

interface CustomerRepositoryInterface
{
    public function find(int $id): Customer;

    public function all();

    public function insert(Customer $customer): Customer;

    public function update(Customer $customer): ?Customer;

    public function delete(Customer $customer): bool;

}