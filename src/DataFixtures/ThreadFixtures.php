<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 19.05.2020
 * Time: 14:34
 */

namespace App\DataFixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Thread;
use App\Entity\User;

class ThreadFixtures extends Fixture implements DependentFixtureInterface
{
    public const TESTTHREAD = "Testthread";

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $thread = new Thread();
        $thread->setHeadline('Neuer Thread');
        $thread->setUser($this->getReference(UserFixtures::TESTUSER));
        $thread->setInputtext("Der Testeintrag");
        $dateAdded = date_create('2019-05-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');
        $thread->setCreated($dateAdded);
        $thread->setCategory('Pflegetipps');
        $thread->setLikes('10');

        $manager->persist($thread);
        $manager->flush();
        $this->addReference(self::TESTTHREAD, $thread);
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
            UserFixtures::class
        ];
    }
}