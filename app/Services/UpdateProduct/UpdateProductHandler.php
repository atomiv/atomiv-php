<?php

namespace App\Services\UpdateProduct;

use App\Entities\Product;
use App\Repository\ProductRepository;

class UpdateProductHandler
{
    private $productRepository;

    public function __construct(ProductRepository $product)
    {
        $this->productRepository = $product;
    }

    public function handle(UpdateProductRequest $request, int $id): UpdateProductResponse
    {
        $productRecord = $this->productRepository->find($id);

        $product = new Product();

        $product->setId($productRecord->getId());
        $product->setCode($request->getCode());
        $product->setDescription($request->getDescription());
        $product->setUnitPrice($request->getUnitPrice());

        $this->productRepository->update($product);

        $response = new UpdateProductResponse();
        $response->setId($product->getId());
        $response->setCode($product->getCode());
        $response->setUnitPrice($product->getUnitPrice());
        $response->setDescription($product->getDescription());

        return $response;
    }
}