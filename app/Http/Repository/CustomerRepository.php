<?php

namespace App\Http\Repository;

use App\Customer;
use App\Http\Repository\Interfaces\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    public function save(array $attributes): ?Model
    {
        return $this->customerModel->create($attributes);
    }

    public function update(int $id, array $attributes): ?bool
    {
        return $this->customerModel->whereId($id)->update($attributes);
    }

    public function delete(int $id): ?bool
    {
        return $this->customerModel->destroy($id);
    }
}
