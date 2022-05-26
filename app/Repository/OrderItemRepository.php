<?php


namespace App\Repository;

use App\Records\OrderItemRecord;

use App\Repository\Interfaces\OrderItemRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Illuminate\Database\Eloquent\Model;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    /**
     * @var string
     */
    private $class = 'App\Records\OrderItemRecord';

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

    public function insert(OrderItemRecord $orderItem): OrderItemRecord
    {
        $this->em->persist($orderItem);

        $this->em->flush();

        return $orderItem;
    }

    public function update(OrderItemRecord $orderItem): OrderItemRecord
    {
        $this->em->persist($orderItem);

        $this->em->flush();

        return $orderItem;
    }

}
