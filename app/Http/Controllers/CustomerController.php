<?php

namespace App\Http\Controllers;

use App\Http\Repository\CustomerRepository;
use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    private $customerRepo;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function getCustomer($id){

        $customer = $this->customerRepo->find($id);

        if ($customer)
            return response(new CustomerResource($customer),200);

        return response('Customer not found.',404);
    }

    public function getAllCustomers(){

        $customers = $this->customerRepo->all();

        return response(new CustomerCollection($customers),200);
    }

    public function create(CreateCustomerRequest $request){

        $customer = $this->customerRepo->save($request->all());

        if ($customer)
            return response(new CustomerResource($customer),201);

        return response('Customer is not created',422);
    }

    public function update(UpdateCustomerRequest $request,$id){

        $customer = $this->customerRepo->update($id,$request->all());

        if ($customer)
            return response('Customer successfully updated',200);

        return response('Customer is not updated',422);
    }

    public function delete($id){
        $customer = $this->customerRepo->delete($id);

        if ($customer)
            return response('Customer successfully deleted',200);

        return response('Customer is not deleted',409);
    }
}
