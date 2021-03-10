<?php
namespace App\Services\Dto;

use InvalidArgumentException;
abstract class AbstractDto
{
    public function __construct(array $data){
       $this->map($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    abstract protected function map(array $data): void;
}
