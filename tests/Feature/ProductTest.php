<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    private $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = factory(Product::class)->create();

    }

    public function testListSingleProduct(){
        $response = $this->get('/api/products/'.$this->product->id);

        $response->assertStatus(200);
    }

    public function testListAllProducts(){
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function testCreateNewProduct(){

        $response = $this->post('api/products',$this->product->toArray());

        $this->get('/api/products/'.$this->product->id)->assertSee($this->product->code,$this->product->description);

        $response->assertStatus(201);
    }

    public function testUpdateProduct(){
        $response = $this->put('api/products/' . $this->product->id,['code' => '123456']);

        $response->assertStatus(200);

        $this->get('/api/products/'.$this->product->id)->assertSee('123456');

    }

    public function testDeleteProduct(){
        $response = $this->delete('api/products/' . $this->product->id);

        $response->assertStatus(200);

        $this->get('/api/products/'.$this->product->id)->assertSee(null);

    }
}
