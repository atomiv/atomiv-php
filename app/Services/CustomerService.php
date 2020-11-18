<?php


namespace App\Services;


use App\Repository\CustomerRepository;

class CustomerService
{

    private $customerRepository;

    public function __construct(CustomerRepository $customer)
    {
        $this->customerRepository = $customer;
    }

    public function getCustomer($id){

        return $this->customerRepository->find($id);
    }

    public function getAllCustomers(){

        return $this->customerRepository->all();
    }

    public function insert($attributes){

        return $this->customerRepository->insert($attributes);
    }

    public function update($attributes,$id){

        return $this->customerRepository->update($attributes,$id);
    }

    public function delete($id){

        return $this->customerRepository->delete($id);
    }
}
