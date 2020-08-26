<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomer($id){

        $customer = Customer::find($id);
        if ($customer)
            return response($customer,200);

        return response('Customer not found.',404);
    }

    public function getAllCustomers(){

        $customers = Customer::all();

        return response($customers,200);
    }

    public function create(Request $request){
        $this->validate($request,[
            'first_name' => 'string|required',
            'last_name' => 'string|required'
        ]);

        $customer = Customer::create($request->all());

        if ($customer)
            return response($customer,201);

        return response('Customer is not created',422);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'first_name' => 'string|nullable',
            'first_last' => 'string|nullable',
        ]);

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
