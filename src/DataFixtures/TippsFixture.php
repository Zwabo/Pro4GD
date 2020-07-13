<?php
/**
 * Created by PhpStorm.
 * User: Rita
 * Date: 02.06.2020
 * Time: 13:23
 */

namespace App\DataFixtures;

use App\Entity\Tipps;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class TippsFixture extends Fixture
{
    public const TIPPS = 'tipps';
    public const TIPPS2 = 'tipps2';
    public const TIPPS3 = 'tipps3';

    public const TIPPS4 = 'tipps4';
    public const TIPPS5 = 'tipps5';
    public const TIPPS6 = 'tipps6';


    public function load(ObjectManager $manager)
    {
        $tipps = new Tipps();

        $tipps->setTitle("Das sind die besten Anti-Stress-Pflanzen");
        $tipps->setThumbnail("/images/newsThumbnails/5.png");
        $date_posted = date_create('2019-05-19 12:30:03');
        $date_posted->format('Y-m-d h.i.s');
        $tipps->setDatePosted($date_posted);
        $tipps->setShortText("Gestressten Menschen wir oft zu Achtsamkeitsübungen und Spaziergängen in der Natur geraten. Begleitend können aber Kräuter 
        Linderung bringen.");
        $tipps->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($tipps);
        $manager->flush();

        $this->addReference(self::TIPPS, $tipps);


        $tipps2 = new Tipps();

        $tipps2->setTitle("Diese giftige Pflanzen verursacht fiese Verbrennungen");
        $tipps2->setThumbnail("/images/newsThumbnails/4.png");
        $date_posted2 = date_create('2019-04-03 12:30:03');
        $date_posted2->format('Y-m-d h.i.s');
        $tipps2->setDatePosted($date_posted2);
        $tipps2->setShortText("Zunächst nur in Gärten als Zierpflanze eingebracht, breitet sich der Riesenbärenklau mittlerweile in der heimischen Flora immer weiter aus. Nicht ohne Folgen für die Gesundheit. Denn die Herkulesstaude verursacht schmerzhafte Verbrennungen. Das sollten Sie über die Pflanze wissen.");
        $tipps2->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($tipps2);
        $manager->flush();

        $this->addReference(self::TIPPS2, $tipps);


        $tipps3 = new Tipps();

        $tipps3->setTitle("Diese Wildkräuter und Beeren sind echte Nährstoffbomben");
        $tipps3->setThumbnail("//images/newsThumbnails/3.png");
        $date_posted3 = date_create('2019-04-03 12:30:03');
        $date_posted3->format('Y-m-d h.i.s');
        $tipps3->setDatePosted($date_posted3);
        $tipps3->setShortText("Superfoods liegen im Trend und sind inzwischen in Drogerie, Reformhaus oder Biomarkt zu haben. Dabei muss man für die Nährstoffbomben gar nicht tief in die Tasche greifen. Vor der Haustür wachsen Superfoods auch in Deutschland in Hülle und Fülle.");
        $tipps3->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($tipps3);
        $manager->flush();

        $this->addReference(self::TIPPS3, $tipps);


        $tipps4 = new Tipps();

        $tipps4->setTitle("Das sind die besten Anti-Stress-Pflanzen");
        $tipps4->setThumbnail("/images/newsThumbnails/1.png");
        $date_posted4 = date_create('2019-05-19 12:30:03');
        $date_posted4->format('Y-m-d h.i.s');
        $tipps4->setDatePosted($date_posted4);
        $tipps4->setShortText("Gestressten Menschen wir oft zu Achtsamkeitsübungen und Spaziergängen in der Natur geraten. Begleitend können aber Kräuter 
        Linderung bringen.");
        $tipps4->setLongText("this is the very long article everyone was looking forward this whole time and it is even getting longer by the second.");

        $manager->persist($tipps4);
        $manager->flush();

        $this->addReference(self::TIPPS4, $tipps4);


        $tipps5 = new Tipps();

        $tipps5->setTitle("Das sind die besten Anti-Stress-Pflanzen");
        $tipps5->setThumbnail("/images/newsThumbnails/2.png");
        $date_posted5 = date_create('2019-05-19 12:30:03');
        $date_posted5->format('Y-m-d h.i.s');
        $tipps5->setDatePosted($date_posted5);
        $tipps5->setShortText("Gestressten Menschen wir oft zu Achtsamkeitsübungen und Spaziergängen in der Natur geraten. Begleitend können aber Kräuter 
        Linderung bringen.");
        $tipps5->setLongText("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.   

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

        $manager->persist($tipps5);
        $manager->flush();

        $this->addReference(self::TIPPS5, $tipps5);

    }

}