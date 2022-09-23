<?php


namespace App\Repository;

use App\Entities\Product;
use App\Records\ProductRecord;
use App\Repository\Interfaces\ProductRepositoryInterface;
use Doctrine\ORM\EntityManager;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var string
     */
    private $class = 'App\Records\ProductRecord';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function find(int $id): ProductRecord
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    public function all(): array
    {
        return $this->em->getRepository($this->class)->findAll();
    }

    public function add(Product $product): void
    {
        $productRecord = new ProductRecord();

        $productRecord->setUnitPrice($product->getUnitPrice());
        $productRecord->setDescription($product->getDescription());
        $productRecord->setCode($product->getCode());

        $this->em->persist($productRecord);
        $this->em->flush();

        $product->setId($productRecord->getId());
    }

    public function update(Product $product): ProductRecord
    {
        $productRecord = $this->find($product->getId());

        $productRecord->setUnitPrice($product->getUnitPrice());
        $productRecord->setDescription($product->getDescription());
        $productRecord->setCode($product->getCode());

        $this->em->persist($productRecord);
        $this->em->flush();

        return $productRecord;
    }

    public function remove(Product $product): void
    {
        $productRecord = $this->find($product->getId());

        $this->em->remove($productRecord);
        $this->em->flush();
    }

}
