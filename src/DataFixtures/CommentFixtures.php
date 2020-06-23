<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 19.05.2020
 * Time: 14:33
 */

namespace App\DataFixtures;


use App\Entity\Comment;
use App\Entity\Thread;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public const TESTCOMMENT = 'Testcomment';

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $comment = new Comment();
        $comment->setText('Kommentartext');
        $comment->setUser($this->getReference(UserFixtures::TESTUSER));
        $comment->setThread($this->getReference(ThreadFixtures::TESTTHREAD));
        $dateAdded = date_create('2019-05-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');
        $comment->setCreated($dateAdded);
        $dateAdded = date_create('2019-05-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');
        $comment->setUpdated($dateAdded);

        $manager->persist($comment);
        $manager->flush();
        $this->addReference(self::TESTCOMMENT, $comment);
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return class-string[]
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            ThreadFixtures::class,
        ];
    }
}