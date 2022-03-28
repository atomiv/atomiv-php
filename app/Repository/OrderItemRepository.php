<?php


namespace App\Repository;

use App\Entities\OrderItem;

use App\Repository\Interfaces\OrderItemRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Illuminate\Database\Eloquent\Model;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    /**
     * @var string
     */
    private $class = 'App\Entities\Order';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function find(int $id): ?OrderItem
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    public function insert(OrderItem $orderItem): OrderItem
    {
        $this->em->persist($orderItem);

        $this->em->flush();

        return $orderItem;
    }

    public function update(OrderItem $orderItem): OrderItem
    {
        $this->em->persist($orderItem);

        $this->em->flush();

        return $orderItem;
    }

}
