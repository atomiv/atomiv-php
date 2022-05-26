<?php

namespace App\Repository;

use App\Records\CustomerRecord;
use App\Repository\Interfaces\CustomerRepositoryInterface;
use Doctrine\ORM\EntityManager;


class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var string
     */
    private $class = 'App\Records\CustomerRecord';

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function find(int $id): CustomerRecord
    {

        return $this->em->getRepository($this->class)->find($id);
    }

    public function all()
    {
        return $this->em->getRepository($this->class)->findAll();
    }

    public function insert(CustomerRecord $customer): CustomerRecord
    {
        $this->em->persist($customer);

        $this->em->flush();

        return $customer;
    }

    public function update(CustomerRecord $customer): CustomerRecord
    {
        $this->em->persist($customer);

        $this->em->flush();

        return $customer;
    }

    public function delete(CustomerRecord $customer): bool
    {
        $this->em->remove($customer);

        $this->em->flush();

        return true;
    }
}
