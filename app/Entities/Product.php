<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products_doctrine")
 */
class Product
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
    private $code;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string")
     */
    private $unitPrice;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $createdAt;

    public function getId(){
        return $this->id;
    }

    public function setCode(string $code){
        $this->code = $code;
    }

    public function getCode(){
       return $this->code;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setUnitPrice(float $unitPrice){
        $this->unitPrice = $unitPrice;
    }

    public function getUnitPrice(){
        return $this->unitPrice;
    }
}