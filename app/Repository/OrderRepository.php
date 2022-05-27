<?php

namespace App\Repository;

use App\Customer;
use App\Records\OrderRecord;
use App\Repository\Interfaces\OrderRepositoryInterface;
use Doctrine\ORM\EntityManager;


class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var string
     */
    private $class = 'App\Records\OrderRecord';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function find(int $id): OrderRecord
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    public function all()
    {
        return $this->em->getRepository($this->class)->findAll();
    }


    public function update(Customer $customer): Customer
    {
        $this->em->persist($customer);

        $this->em->flush();

        return $customer;
    }


    public function insert(OrderRecord $order): OrderRecord
    {
        $this->em->persist($order);

        $this->em->flush();

        return $order;
    }

    public function delete(OrderRecord $order): bool
    {
        $this->em->remove($order);

        $this->em->flush();

        return true;

    }

}
