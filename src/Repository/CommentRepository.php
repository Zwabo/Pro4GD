<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 19.05.2020
 * Time: 16:50
 */

namespace App\Repository;


use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function getCommentById(string $id)
    {

    }
}