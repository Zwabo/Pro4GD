<?php

namespace App\Repository;

use App\Entity\Tipps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tipps|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tipps|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tipps[]    findAll()
 * @method Tipps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TippsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tipps::class);
    }

    // /**
    //  * @return Tipps[] Returns an array of Tipps objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tipps
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
