<?php

namespace App\Services\CreateProduct;

use App\Entities\Product;
use App\Repository\ProductRepository;

class CreateProductHandler
{
    private $productRepository;

    public function __construct(ProductRepository $product)
    {
        $this->productRepository = $product;
    }

    public function handle(CreateProductRequest $request): CreateProductResponse
    {
        $product = new Product();

        $product->setCode($request->getCode());
        $product->setDescription($request->getDescription());
        $product->setUnitPrice($request->getUnitPrice());

        $this->productRepository->add($product);

        $response = new CreateProductResponse();
        $response->setId($product->getId());
        $response->setCode($product->getCode());
        $response->setDescription($product->getDescription());
        $response->setUnitPrice($product->getUnitPrice());

        return $response;

    }
}