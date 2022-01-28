<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="customers_doctrine")
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string")
     */
    private $lastName;

    public function getId(){
        return $this->id;
    }

    public function setFirstName(string $firstName){
        $this->firstName = $firstName;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setLastName(string $lastName){
        $this->lastName = $lastName;
    }

    public function getLastName(){
        return $this->lastName;
    }
}