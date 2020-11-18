<?php

namespace Tests\Feature;

use App\Customer;
use Facade\Ignition\SolutionProviders\DefaultDbNameSolutionProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    private $customer;

    public function setUp(): void
    {
        parent::setUp();

        $this->customer = factory(Customer::class)->create();
    }


    public function testListSingleCustomer(){

        $response = $this->get('/api/customers/'.$this->customer->id);

        $response->assertStatus(200);

    }

    public function testListAllCustomers(){
       $response = $this->get('/api/customers');

       $response->assertStatus(200);

    }

    public function testCreateNewCustomer(){

        $response = $this->post('api/customers',$this->validFields());

        $response->assertStatus(201);

        $this->get('api/customers/' . $response["id"])
            ->assertSee($this->validFields()['first_name'],$this->validFields()['last_name']);

    }

    public function testCustomerFirstNameRequired(){

         $this->post('api/customers',$this->validFields(['first_name'=>null]))
                ->assertSessionHasErrors('first_name');
    }

    public function testCustomerLastNameRequired(){

        $this->post('api/customers',$this->validFields(['last_name'=>null]))
            ->assertSessionHasErrors('last_name');

    }

    public function testCustomerFirstNameHaveTotBeWithoutNumbers(){

        $this->post('api/customers',$this->validFields(['first_name'=>"Jonh123"]))
            ->assertSessionHasErrors('first_name');
    }

    public function testCustomerLastNameHaveTotBeWithoutNumbers(){

        $this->post('api/customers',$this->validFields(['last_name'=>"Doe123"]))
            ->assertSessionHasErrors('last_name');
    }

    public function testUpdateCustomer(){

        $response = $this->put('api/customers/' . $this->customer->id,['first_name' => 'John']);

        $response->assertStatus(200);

        $this->get('api/customers/' . $this->customer->id)->assertSee('John');

    }

    public function testDeleteCustomer(){

        $response = $this->delete('api/customers/' . $this->customer->id);

        $response->assertStatus(200);

        $this->get('api/customers/' . $this->customer->id)->assertSee(null);

    }

    protected function validFields($overrides = []){

        return array_merge([
            'first_name' => "John",
            "last_name" => "Doe"
        ],$overrides);
    }
}
