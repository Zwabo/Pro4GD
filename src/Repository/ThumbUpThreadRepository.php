<?php

namespace App\Repository;

use App\Entity\ThumbUpThread;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ThumbUpThreadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThumbUpThread::class);
    }

}