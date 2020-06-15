<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 19.05.2020
 * Time: 16:50
 */

namespace App\Repository;


use App\Entity\Thread;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ThreadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thread::class);
    }

    public function getThreadById(string $id)
    {

    }
}