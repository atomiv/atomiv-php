<?php

namespace App\Services\BrowseProducts;

use App\Repository\ProductRepository;

class GetAllProductsHandler
{
    private $productRepository;

    public function __construct(ProductRepository $product)
    {
        $this->productRepository = $product;
    }

    public function handle(){

        return $this->productRepository->all();
    }
}