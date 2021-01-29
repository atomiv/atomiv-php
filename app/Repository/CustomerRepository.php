<?php

namespace App\Repository;

use App\Customer;
use App\Repository\Interfaces\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\DeclareDeclare;

class CustomerRepository
{
    private $customerModel;

    public function __construct(Customer $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    public function find(int $id): ?Model
    {
        return $this->customerModel->find($id);
    }

    public function all(): ?Collection
    {
        return $this->customerModel->all();
    }

    public function insert($customer): ?Model
    {
        $customer->save();

        return $customer;
    }

    public function update(int $id, $customer): ?bool
    {
       return $this->customerModel->whereId($id)->update($customer);

    }

    public function delete(int $id): ?bool
    {
        return $this->customerModel->destroy($id);
    }
}
