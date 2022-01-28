<?php

namespace App\Repository;

use App\Entities\Customer;
use App\Repository\Interfaces\CustomerRepositoryInterface;
use Doctrine\ORM\EntityManager;


class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var string
     */
    private $class = 'App\Entities\Customer';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function find(int $id): Customer
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    public function all()
    {
        return $this->em->getRepository($this->class)->findAll();
    }

    public function insert(Customer $product): Customer
    {
        $this->em->persist($product);

        $this->em->flush();

        return $product;
    }

    public function update(Customer $customer): Customer
    {
        $this->em->persist($customer);

        $this->em->flush();

        return $customer;
    }

    public function delete(Customer $customer): bool
    {
        $this->em->remove($customer);

        $this->em->flush();

        return true;
    }
}
