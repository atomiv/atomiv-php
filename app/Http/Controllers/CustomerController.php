<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomer($id){

        $customer = Customer::find($id);
        if ($customer)
            return response(new CustomerResource($customer),200);

        return response('Customer not found.',404);
    }

    public function getAllCustomers(){

        $customers = Customer::all();

        return response(new CustomerCollection($customers),200);
    }

    public function create(CustomerCreateRequest $request){

        $customer = Customer::create($request->all());

        if ($customer)
            return response(new CustomerResource($customer),201);

        return response('Customer is not created',422);
    }

    public function update(CustomerUpdateRequest $request,$id){

        $customer = Customer::whereId($id)->update($request->all());

        if ($customer)
            return response('Customer successfully updated',200);

        return response('Customer is not updated',422);
    }

    public function delete($id){
        $customer = Customer::destroy($id);

        if ($customer)
            return response('Customer successfully deleted',200);

        return response('Customer is not deleted',409);
    }
}
