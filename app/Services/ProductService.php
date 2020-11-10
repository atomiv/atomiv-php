<?php


namespace App\Services;


use App\Repository\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $product)
    {
        $this->productRepository = $product;
    }

    public function getProduct($id){

       return $this->productRepository->find($id);
    }

    public function getAllProducts(){

        return $this->productRepository->all();
    }

    public function insert($attributes){

        return $this->productRepository->insert($attributes);
    }

    public function update($attributes,$id){

        return $this->productRepository->update($attributes,$id);
    }

    public function delete($id){

        return $this->productRepository->delete($id);
    }
}
