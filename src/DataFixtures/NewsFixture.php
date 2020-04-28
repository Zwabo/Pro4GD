<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $news = new News();

        $news->setTitle();



        $manager->persist($news);

        $manager->flush();
    }
}
