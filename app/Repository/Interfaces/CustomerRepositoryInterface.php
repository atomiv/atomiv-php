<?php


namespace App\Repository\Interfaces;

use App\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CustomerRepositoryInterface
{
    public function find(int $id): Model;

    public function all(): Collection;

    public function insert(Customer $customer): Model;

    public function update(Customer $customer): ?Model;

    public function delete(int $id): bool;

}