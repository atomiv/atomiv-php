<?php


namespace App\Repository;

use App\Entities\OrderItem;
use App\Records\OrderItemRecord;
use App\Repository\Interfaces\OrderItemRepositoryInterface;
use Doctrine\ORM\EntityManager;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    /**
     * @var string
     */
    private $class = 'App\Records\OrderItemRecord';
    private $orderClass = 'App\Records\OrderRecord';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function find(int $id): ?OrderItemRecord
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    public function add(OrderItem $orderItem): void
    {
        $orderItemRecord = new OrderItemRecord();
        $orderRecord = $this->em->getRepository($this->orderClass)->find($orderItem->getOrderId());

        $orderItemRecord->setOrder($orderRecord);
        $orderItemRecord->setQuantity($orderItem->getQuantity());
        $orderItemRecord->setProductId($orderItem->getProductId());
        $orderItemRecord->setProductCode($orderItem->getProductCode());
        $orderItemRecord->setProductPrice($orderItem->getProductPrice());

        $this->em->persist($orderItemRecord);

        $this->em->flush();

        $orderItem->setId($orderItemRecord->getId());
    }

    public function update(OrderItem $orderItem): void
    {
        $orderItemRecord = $this->find($orderItem->getId());

        $orderItemRecord->setQuantity($orderItem->getQuantity());
        $orderItemRecord->setProductId($orderItem->getProductId());
        $orderItemRecord->setProductCode($orderItem->getProductCode());
        $orderItemRecord->setProductPrice($orderItem->getProductPrice());

        $this->em->persist($orderItemRecord);

        $this->em->flush();

    }

}
