<?php


namespace App\Repository\Interfaces;

use App\Records\CustomerRecord;

interface CustomerRepositoryInterface
{
    public function find(int $id): CustomerRecord;

    public function all();

    public function insert(CustomerRecord $customer): CustomerRecord;

    public function update(CustomerRecord $customer): ?CustomerRecord;

    public function delete(CustomerRecord $customer): bool;

}