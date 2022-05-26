<?php

namespace App\Records;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class ProductRecord
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