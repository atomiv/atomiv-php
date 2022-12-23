<?php

namespace App\Repository;

use App\Entities\Order;
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

    public function all(): array
    {
        return $this->em->getRepository($this->class)->findAll();
    }

    public function add(Order $order): void
    {
        $orderRecord = new OrderRecord();
        $orderRecord->setOrderDate($order->getOrderDate());
        $orderRecord->setCustomerId($order->getCustomerId());

        $this->em->persist($orderRecord);
        $this->em->flush();

        $order->setId($orderRecord->getId());
    }
    public function remove(Order $order): void
    {
        $orderRecord = $this->find($order->getId());

        $this->em->remove($orderRecord);

        $this->em->flush();
    }

}
