<?php

namespace App\DataFixtures;

use App\Entity\Plant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $plant = new Plant();

        $plant->setName("Aloe Vera");
        $plant->setAlternativeName("Echte Aloe");
        $plant->setLatinName("Aloe Vera");
        $plant->setGenus("Aloen");
        $plant->setCareLevel("gering");
        $plant->setWateringAmount("500ml");
        $plant->setIcon("path to file");
        $plant->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $plant->setTemperatureIcon("20-25°");
        $plant->setFertiliserIcon("2 bis 4 Wochen");
        $plant->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $plant->setHeydayIcon("Frühling");
        $plant->setHeightIcon("45 – 55 cm");
        $plant->setSpecialFeatureIcon("Heilpflanze");
        $plant->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $plant->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $plant->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $plant->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $plant->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $plant->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $plant->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $plant->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $plant->setFlowerColor("Rot,Gelb, Orange");
        $plant->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $plant->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($plant);

        $manager->flush();
    }
}
