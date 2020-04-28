<?php

namespace App\DataFixtures;

use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $news = new News();

        $news->setTitle("TestTitle1: Wie ich meine Pflanzen nicht umbringe!");
        $news->setDatePosted(date_create('2019-05-19 12:30:03'));
        $news->setShortText("I guess this is the short version of the article");
        $news->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");



        $manager->persist($news);

        $manager->flush();
    }
}
