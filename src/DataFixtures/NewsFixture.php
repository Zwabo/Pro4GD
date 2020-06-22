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

    public const NEWS4 = 'news4';
    public const NEWS5 = 'news5';
    public const NEWS6 = 'news6';

    public function load(ObjectManager $manager)
    {
        $news = new News();

        $news->setTitle("Das sind die besten Anti-Stress-Pflanzen");
        $news->setThumbnail("/images/newsThumbnails/5.png");
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
        $news2->setThumbnail("/images/newsThumbnails/4.png");
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
        $news3->setThumbnail("/images/newsThumbnails/3.png");
        $date_posted3 = date_create('2019-04-03 12:30:03');
        $date_posted3->format('Y-m-d h.i.s');
        $news3->setDatePosted($date_posted3);
        $news3->setShortText("Superfoods liegen im Trend und sind inzwischen in Drogerie, Reformhaus oder Biomarkt zu haben. Dabei muss man für die Nährstoffbomben gar nicht tief in die Tasche greifen. Vor der Haustür wachsen Superfoods auch in Deutschland in Hülle und Fülle.");
        $news3->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($news3);
        $manager->flush();

        $this->addReference(self::NEWS3, $news);


        $news4 = new News();

        $news4->setTitle("Das sind die besten Anti-Stress-Pflanzen");
        $news4->setThumbnail("/images/newsThumbnails/2.png");
        $date_posted4 = date_create('2019-05-19 12:30:03');
        $date_posted4->format('Y-m-d h.i.s');
        $news4->setDatePosted($date_posted4);
        $news4->setShortText("Gestressten Menschen wir oft zu Achtsamkeitsübungen und Spaziergängen in der Natur geraten. Begleitend können aber Kräuter 
        Linderung bringen.");
        $news4->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($news4);
        $manager->flush();

        $this->addReference(self::NEWS4, $news4);


        $news5 = new News();

        $news5->setTitle("Das sind die besten Anti-Stress-Pflanzen");
        $news5->setThumbnail("/images/newsThumbnails/1.png");
        $date_posted5 = date_create('2019-05-19 12:30:03');
        $date_posted5->format('Y-m-d h.i.s');
        $news5->setDatePosted($date_posted5);
        $news5->setShortText("Gestressten Menschen wir oft zu Achtsamkeitsübungen und Spaziergängen in der Natur geraten. Begleitend können aber Kräuter 
        Linderung bringen.");
        $news5->setLongText("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   

Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   

Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.   

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.   

At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.   

Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus.   

Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.   

Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.   

Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo");

        $manager->persist($news5);
        $manager->flush();

        $this->addReference(self::NEWS5, $news5);

    }
}
