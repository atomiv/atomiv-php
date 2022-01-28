<?php


namespace App\Repository;

use App\Entities\Product;
use App\Repository\Interfaces\ProductRepositoryInterface;
use Doctrine\ORM\EntityManager;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var string
     */
    private $class = 'App\Entities\Product';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function find(int $id): Product
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    public function all()
    {
        return $this->em->getRepository($this->class)->findAll();
    }

    public function insert(Product $product): Product
    {
        $this->em->persist($product);

        $this->em->flush();

        return $product;
    }

    public function update(Product $product): Product
    {
        $this->em->persist($product);

        $this->em->flush();

        return $product;
    }

    public function delete(Product $product): bool
    {
        $this->em->remove($product);

        $this->em->flush();
        return true;
    }

}
