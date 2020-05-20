<?php

namespace App\DataFixtures;

use App\Entity\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NewsFixture extends Fixture
{
    public const NEWS = 'news';
    public const NEWS2 = 'news2';
    public const NEWS3 = 'news3';

    public function load(ObjectManager $manager)
    {
        $news = new News();

        $news->setTitle("Das sind die besten Anti-Stress-Pflanzen");
        $news->setThumbnail("/images/plants/Aloe.png");
        $date_posted = date_create('2019-05-19 12:30:03');
        $date_posted->format('Y-m-d h.i.s');
        $news->setDatePosted($date_posted);
        $news->setShortText("Gestressten Menschen wir oft zu Achtsamkeitsübungen und Spaziergängen in der Natur geraten. Begleitend können aber Kräuter 
        Linderung bringen.");
        $news->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($news);
        $manager->flush();

        $this->addReference(self::NEWS, $news);


        $news2 = new News();

        $news2->setTitle("Diese giftige Pflanzen verursacht fiese Verbrennungen");
        $news2->setThumbnail("/images/plants/Aloe.png");
        $date_posted2 = date_create('2019-04-03 12:30:03');
        $date_posted2->format('Y-m-d h.i.s');
        $news2->setDatePosted($date_posted2);
        $news2->setShortText("Zunächst nur in Gärten als Zierpflanze eingebracht, breitet sich der Riesenbärenklau mittlerweile in der heimischen Flora immer weiter aus. Nicht ohne Folgen für die Gesundheit. Denn die Herkulesstaude verursacht schmerzhafte Verbrennungen. Das sollten Sie über die Pflanze wissen.");
        $news2->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($news2);
        $manager->flush();

        $this->addReference(self::NEWS2, $news);


        $news3 = new News();

        $news3->setTitle("Diese Wildkräuter und Beeren sind echte Nährstoffbomben");
        $news3->setThumbnail("/images/plants/Aloe.png");
        $date_posted3 = date_create('2019-04-03 12:30:03');
        $date_posted3->format('Y-m-d h.i.s');
        $news3->setDatePosted($date_posted3);
        $news3->setShortText("Superfoods liegen im Trend und sind inzwischen in Drogerie, Reformhaus oder Biomarkt zu haben. Dabei muss man für die Nährstoffbomben gar nicht tief in die Tasche greifen. Vor der Haustür wachsen Superfoods auch in Deutschland in Hülle und Fülle.");
        $news3->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($news3);
        $manager->flush();

        $this->addReference(self::NEWS3, $news);

    }
}
