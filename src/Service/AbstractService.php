<?php


namespace App\Service;


use Doctrine\Persistence\ManagerRegistry;

abstract class AbstractService
{

    protected $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
}