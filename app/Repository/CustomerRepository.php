<?php

namespace App\Repository;

use App\Entities\Customer;
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

    public function all(): array
    {
        return $this->em->getRepository($this->class)->findAll();
    }

    public function add(Customer $customer): void
    {
        $customerRecord = new CustomerRecord();

        $customerRecord->setFirstName($customer->getFirstName());
        $customerRecord->setLastName($customer->getLastName());

        $this->em->persist($customerRecord);

        $this->em->flush();

        $customer->setId($customerRecord->getId());
    }

    public function update(Customer $customer): CustomerRecord
    {
        $customerRecord = $this->find($customer->getId());

        $customerRecord->setFirstName($customer->getFirstName());
        $customerRecord->setLastName($customer->getLastName());

        $this->em->persist($customerRecord);

        $this->em->flush();

        return $customerRecord;
    }

    public function remove(Customer $customer): void
    {
        $customerRecord = $this->find($customer->getId());

        $this->em->remove($customerRecord);

        $this->em->flush();
    }

}
