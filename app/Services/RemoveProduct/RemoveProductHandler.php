<?php

namespace App\Services\RemoveProduct;

use App\Entities\Product;
use App\Repository\ProductRepository;

class RemoveProductHandler
{
    private $productRepository;

    public function __construct(ProductRepository $product)
    {
        $this->productRepository = $product;
    }

    public function handle(int $id): void
    {
        $productRecord = $this->productRepository->find($id);

        $product = new Product();
        $product->setId($productRecord->getId());

        $this->productRepository->remove($product);
    }
}