<?php

namespace App\Services\GetProduct;

use App\Repository\ProductRepository;

class GetProductHandler
{
    private $productRepository;

    public function __construct(ProductRepository $product)
    {
        $this->productRepository = $product;
    }

    public function handle($id){

        return $this->productRepository->find($id);
    }
}