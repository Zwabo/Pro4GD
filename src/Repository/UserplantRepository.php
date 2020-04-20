<?php

namespace App\Repository;

use App\Entity\Userplant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Userplant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userplant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userplant[]    findAll()
 * @method Userplant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserplantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Userplant::class);
    }

    // /**
    //  * @return Userplant[] Returns an array of Userplant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Userplant
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
