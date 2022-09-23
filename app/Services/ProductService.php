<?php


namespace App\Services;


use App\Entities\Product;
use App\Repository\ProductRepository;
use App\Services\Dto\CreateProductRequestDto;
use App\Services\Dto\CreateProductResponseDto;
use App\Services\Dto\UpdateProductRequestDto;
use App\Services\Dto\UpdateProductResponseDto;
use App\Services\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface
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

    public function add(CreateProductRequestDto $request): CreateProductResponseDto
    {
        $product = new Product();

        $product->setCode($request->getCode());
        $product->setDescription($request->getDescription());
        $product->setUnitPrice($request->getUnitPrice());

        $this->productRepository->add($product);

        $response = new CreateProductResponseDto();
        $response->setId($product->getId());
        $response->setCode($product->getCode());
        $response->setDescription($product->getDescription());
        $response->setUnitPrice($product->getUnitPrice());

        return $response;

    }

    public function update(UpdateProductRequestDto $request, int $id): UpdateProductResponseDto
    {
        $productRecord = $this->productRepository->find($id);

        $product = new Product();

        $product->setId($productRecord->getId());
        $product->setCode($request->getCode());
        $product->setDescription($request->getDescription());
        $product->setUnitPrice($request->getUnitPrice());

        $this->productRepository->update($product);

        $response = new UpdateProductResponseDto();
        $response->setId($product->getId());
        $response->setCode($product->getCode());
        $response->setUnitPrice($product->getUnitPrice());
        $response->setDescription($product->getDescription());

        return $response;
    }

    public function remove(int $id): void
    {
        $productRecord = $this->productRepository->find($id);

        $product = new Product();
        $product->setId($productRecord->getId());

        $this->productRepository->remove($product);
    }
}
