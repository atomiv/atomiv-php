<?php


namespace App\Services;


use App\Customer;
use App\Repository\CustomerRepository;
use App\Services\Dto\CreateCustomerRequestDto;
use App\Services\Dto\UpdateCustomerRequestDto;

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

    public function insert(CreateCustomerRequestDto $request){
        $customer = new Customer();

        $customer->first_name = $request->getFirstName();
        $customer->last_name = $request->getLastName();

        return $this->customerRepository->insert($customer);
    }

    public function update($id,$customer){
        return $this->customerRepository->update($id,$customer);
    }

    public function delete($id){

        return $this->customerRepository->delete($id);
    }
}
