<?php

namespace App\Repository;

use App\Customer;
use App\Repository\Interfaces\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\DeclareDeclare;

class CustomerRepository implements BaseRepository
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
        return $customer->save();

//        $this->customerModel->first_name = $customer->getFirstName();
//        $this->customerModel->last_name = $customer->getLastName();
//
//        $this->customerModel->save();
//
//        return $this->customerModel;
    }

    public function update(int $id, $attributes): ?bool
    {
        $customer = $this->customerModel->find($id);

         $this->customerModel->whereId($id)->update($attributes);
    }

    public function delete(int $id): ?bool
    {
        return $this->customerModel->destroy($id);
    }
}
