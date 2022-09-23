<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{

    private $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->post('api/products',$this->validFields());

        $products = $this->get('api/products');

        $this->product = $products['data'][0];

    }

    public function testListSingleProduct(){

        $response = $this->get('/api/products/'.$this->product['id']);

        $response->assertStatus(200);
    }

    public function testListAllProducts(){

        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function testCreateNewProduct(){

        $response = $this->post('api/products',$this->validFields());

        $response->assertStatus(201);

        $this->get('/api/products/'. $response["id"])
            ->assertSee($this->validFields()["code"],$this->validFields()["description"]);

    }

    public function testUpdateProduct(){

        $response = $this->put('api/products/' . $this->product['id'],["description" => "New description",'code'=>'new123','unit_price'=>12.3]);

        $response->assertStatus(200);

        $this->get('/api/products/'. $this->product['id'])->assertSee('New description');

    }

    public function testDeleteProduct(){

        $response = $this->delete('api/products/' . $this->product['id']);

        $response->assertStatus(200);

        $this->get('/api/products/'.$this->product['id'])->assertSee(null);

    }

    protected function validFields($overrides = []){

        return array_merge([
            "code" => "CODE123",
            "description" => "This is description.",
            "unit_price" => "5.20"
        ],$overrides);

    }
}
