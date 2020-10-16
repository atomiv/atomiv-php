<?php


namespace App\Services;


use App\Repository\ProductRepository;

class ProductService
{
    private $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function getProduct($id){

       return $this->product->find($id);
    }

    public function getAllProducts(){

        return $this->product->all();
    }

    public function save($attributes){

        return $this->product->save($attributes);
    }

    public function update($attributes,$id){

        return $this->product->update($attributes,$id);
    }

    public function delete($id){

        return $this->product->delete($id);
    }
}
