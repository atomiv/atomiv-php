<?php


namespace App\Repository;

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

    public function all()
    {
        return $this->em->getRepository($this->class)->findAll();
    }

    public function insert(ProductRecord $product): ProductRecord
    {
        $this->em->persist($product);

        $this->em->flush();

        return $product;
    }

    public function update(ProductRecord $product): ProductRecord
    {
        $this->em->persist($product);

        $this->em->flush();

        return $product;
    }

    public function delete(ProductRecord $product): bool
    {
        $this->em->remove($product);

        $this->em->flush();
        return true;
    }

}
