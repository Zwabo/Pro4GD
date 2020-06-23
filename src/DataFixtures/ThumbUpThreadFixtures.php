<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 19.05.2020
 * Time: 14:32
 */

namespace App\DataFixtures;

use App\Entity\ThumbUpThread;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ThumbUpThreadFixtures extends Fixture implements DependentFixtureInterface
{
    public const TESTLIKETHREAD = "testlikethread";
    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $like = new ThumbUpThread();
        $like->setUser($this->getReference(UserFixtures::TESTUSER));
        $like->setThread($this->getReference(ThreadFixtures::TESTTHREAD));

        $manager->persist($like);
        $manager->flush();
        $this->addReference(self::TESTLIKETHREAD, $like);
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
           CommentFixtures::class,
           ThreadFixtures::class,
       ];
    }
}