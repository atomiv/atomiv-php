<?php

namespace App\Repository;

use App\Customer;
use App\Repository\Interfaces\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CustomerRepository implements CustomerRepositoryInterface
{
    private $customerModel;

    public function __construct(Customer $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    public function find(int $id): Model
    {
        return $this->customerModel->find($id);
    }

    public function all() : Collection
    {
        return $this->customerModel->all();
    }

    public function insert(Customer $customer): Model
    {
        $customer->save();

        return $customer;
    }

    public function update(Customer $customer) : Model
    {
        $customer->save();

        return $customer;

    }

    public function delete(int $id) : bool
    {
        return $this->customerModel->destroy($id);
    }
}
