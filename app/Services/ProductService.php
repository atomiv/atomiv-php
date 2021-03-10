<?php


namespace App\Services;


use App\Product;
use App\Repository\ProductRepository;
use App\Services\Dto\CreateProductRequestDto;
use App\Services\Dto\UpdateProductRequestDto;
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

    public function insert(CreateProductRequestDto $request){
        $product = new Product();

        $product->code = $request->getCode();
        $product->description = $request->getDescription();
        $product->unit_price = $request->getUnitPrice();

        return $this->productRepository->insert($product);
    }

    public function update(UpdateProductRequestDto $request, int $id){
        $product = $this->productRepository->find($id);

        $product->code = $request->getCode();
        $product->description = $request->getDescription();
        $product->unit_price = $request->getUnitPrice();

        return $this->productRepository->update($product);
    }

    public function delete(int $id){

        return $this->productRepository->delete($id);
    }
}
