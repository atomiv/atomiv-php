<?php


namespace App\Services;

use App\Entities\Customer;
use App\Records\CustomerRecord;
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

        $this->customerRepository->add($customer);
    }

    public function update(UpdateCustomerRequestDto $request,$id){
        $customerRecord = $this->customerRepository->find($id);

        $customer = new Customer();

        $customer->setId($customerRecord->getId());
        $customer->setFirstName($request->getFirstName());
        $customer->setLastName($request->getLastName());

        $this->customerRepository->update($customer);

        return $customer;
    }

    public function delete(int $id){
        $customerRecord = $this->customerRepository->find($id);

        $customer = new Customer();
        $customer->setId($customerRecord->getId());

        $this->customerRepository->remove($customer);
    }
}
