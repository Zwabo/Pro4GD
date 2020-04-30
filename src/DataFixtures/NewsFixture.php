<?php

namespace App\DataFixtures;

use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsFixture extends Fixture
{
    public const NEWS = 'news';
    public function load(ObjectManager $manager)
    {
        $news = new News();

        $news->setTitle("Das sind die besten Anti-Stress-Pflanzen");
        $news->setThumbnail("/images/pictures/aloe.png");
        $date_posted = date_create('2019-05-19 12:30:03');
        $date_posted->format('Y-m-d h.i.s');
        $news->setDatePosted($date_posted);
        $news->setShortText("Gestressten Menschen wir oft zu Achtsamkeitsübungen und Spaziergängen in der Natur geraten. Begleitend können aber Kräuter 
        Linderung bringen. Ein Experte erklärt, welche Pflanzen dafür infrage kommen.");
        $news->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");



        $manager->persist($news);

        $manager->flush();

        $this->addReference(self::NEWS, $news);
    }
}
