<?php


namespace App\Repository\Interfaces;

use App\Entities\Customer;
use App\Records\CustomerRecord;

interface CustomerRepositoryInterface
{
    public function find(int $id): CustomerRecord;

    public function all(): array;

    public function add(Customer $customer): void;

    public function update(Customer $customer): void;

    public function remove(Customer $customer): void;

}