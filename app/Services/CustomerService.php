<?php


namespace App\Services;


use App\Repository\CustomerRepository;

class CustomerService
{

    private $customer;

    public function __construct(CustomerRepository $customer)
    {
        $this->customer = $customer;
    }

    public function getCustomer($id){

        return $this->customer->find($id);
    }

    public function getAllCustomers(){

        return $this->customer->all();
    }

    public function save($attributes){

        return $this->customer->save($attributes);
    }

    public function update($attributes,$id){

        return $this->update($attributes,$id);
    }

    public function delete($id){

        return $this->delete($id);
    }
}
