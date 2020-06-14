<?php
/**
 * Created by PhpStorm.
 * User: Verena
 * Date: 19.05.2020
 * Time: 14:32
 */

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\ThumpUp;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ThumbUpFixtures extends Fixture implements DependentFixtureInterface
{
    public const TESTLIKE = "testlike";
    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $like = new ThumpUp();
        $like->setUser($this->getReference(UserFixtures::TESTUSER));
        $like->setComment($this->getReference(CommentFixtures::TESTCOMMENT));

        $manager->persist($like);
        $manager->flush();
        $this->addReference(self::TESTLIKE, $like);
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
           CommentFixtures::class
       ];
    }
}