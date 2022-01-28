<?php


namespace App\Services;

use App\Entities\Customer;
use App\Repository\CustomerRepository;
use App\Services\Dto\CreateCustomerRequestDto;
use App\Services\Dto\UpdateCustomerRequestDto;
use App\Services\Interfaces\CustomerServiceInterface;

class CustomerService implements CustomerServiceInterface
{

    private $customerRepository;

    public function __construct(CustomerRepository $customer)
    {
        $this->customerRepository = $customer;
    }

    public function getCustomer(int $id){

        return $this->customerRepository->find($id);
    }

    public function getAllCustomers(){

        return $this->customerRepository->all();
    }

    public function insert(CreateCustomerRequestDto $request){
        $customer = new Customer();

        $customer->setFirstName($request->getFirstName());
        $customer->setLastName($request->getLastName());

        return $this->customerRepository->insert($customer);
    }

    public function update(UpdateCustomerRequestDto $request,$id){
        $customer = $this->customerRepository->find($id);

        $customer->setFirstName($request->getFirstName());
        $customer->setLastName($request->getLastName());

        $this->customerRepository->update($customer);

        return $customer;
    }

    public function delete(int $id){
        $customer = $this->customerRepository->find($id);

        return $this->customerRepository->delete($customer);
    }
}
