<?php

namespace App\DataFixtures;

use App\Entity\Plant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlantFixtures extends Fixture implements OrderedFixtureInterface
{

    public const ALOEVERA = 'aloevera';
    public const ALPENVEILCHEN = 'alpenveilchen';
    public const BEGONIE = 'begonie';
    public const BLATTBEGONIE = 'blattbegonie';
    public const KOENIGSBEGONIE = 'koenigsbegonie';
    public const WIMPERNBEGONIE = 'wimpernbegonie';
    public const ZIMMERCALLA = 'zimmercalla';

    public const GERANIE = 'geranie';
    public const EDELGERANIE = 'edelgeranie';
    public const SCHMETTERLINGSGERANIE = 'schmetterlingsgeranie';
    public const GLUECKSFEDER = 'gluecksfeder';
    public const CHINROSENEIBISCH = 'chinroseneibisch';
    public const HAWAIPALME = 'hawaipalme';
    public const KATZENGRAS = 'katzengras';
    public const VENUSFLIEGENFALLE = 'venusfliegenfalle';
    public const NARZISSE = 'narzisse';
    public const ORCHIDEE = 'orchidee';
    public const WEIHNACHTSSTERN = 'weihnachtsstern';
    public const YUCCAPALME = 'yuccapalme';
    public const SCHWERTFARN = 'schwertfarn';

    public function load(ObjectManager $manager)
    {
        /*---------------------------------ALOEVERA--------------------------------*/

        $plant = new Plant();

        $plant->setName("Aloe Vera");
        $plant->setAlternativeName("Echte Aloe");
        $plant->setLatinName("Aloe Vera");
        $plant->setGenus("Aloen");
        $plant->setCareLevel("gering");
        $plant->setWateringAmount("500ml");
        $plant->setIcon("images/plants/Aloe.png");
        $plant->setWindowIcon("images/plants/AloeBackground.png");
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
        $this->addReference(self::ALOEVERA, $plant);


        /*---------------------------------ALPENVEILCHEN--------------------------------*/

        $alpenveilchen = new Plant();

        $alpenveilchen->setName("Alpenveilchen");
        $alpenveilchen->setAlternativeName("Zyklamen");
        $alpenveilchen->setLatinName("Cyclamen");
        $alpenveilchen->setGenus("Alpenveilchen");
        $alpenveilchen->setCareLevel("gering");
        $alpenveilchen->setWateringAmount("1x/Tag");
        $alpenveilchen->setLocationIcon("hell, nicht zu viel direkte Sonneneinstrahlung");
        $alpenveilchen->setTemperatureIcon("10-15°C");
        $alpenveilchen->setFertiliserIcon("jede Woche");
        $alpenveilchen->setSubstrateIcon("Blumenerde oder Pflanzerde ");
        $alpenveilchen->setHeydayIcon("3 Monate im Jahr");
        $alpenveilchen->setHeightIcon("32 cm");
        $alpenveilchen->setSpecialFeatureIcon("geringer Wärmeanspruch");
        $alpenveilchen->setShortDescription(
            "Das Alpenveilchen (Cyclamen) ist ein beliebter Schmuck für’s Blumenfenster. Die Primelgewächse sind blühfreudig und pflegeleicht und damit auch als Anfängerpflanze geeignet. Besonders in den Wintermonaten sind die kälteliebenden Pflanzen ein Blickfang. Alpenveilchen zählen zu den beliebtesten Zimmerpflanzen."
        );
        $alpenveilchen->setSpecialFeaturesAddinfo(
            "Eine Besonderheit des Alpenveilchens liegt in seinem geringen Wärmeanspruch. Die Temperaturen sollten möglichst nicht über zehn Grad steigen. In früherer Zeit wurden Alpenveilchen meist zwischen Doppelfenstern aufgestellt und in hohen und schmalen „Doppelfenstertöpfen“ herangezogen.
Alpenveilchen kommen bei guter Pflege erneut zur Blüte. Mehrjährige Pflanzen überraschen mit einer üppigen Blütenpracht. So kann eine zehnjährige Pflanze mehr als 100 Blüten ausbilden."
        );
        $alpenveilchen->setLocationAddinfo(
            "Alpenveilchen benötigen einen hellen, aber nicht vollsonnigen Standort. Ein luftiger Standplatz ist von Vorteil."
        );
        $alpenveilchen->setWateringAmountAddinfo(
            "Alpenveilchen benötigen regelmäßig Wasser, sollten aber nicht zu üppig gegossen werden. Von oben wird vorsichtig um die Knolle herum bewässert. Der Pflanztopf sollte nicht austrocknen. Alpenveilchen reagieren besonders empfindlich auf Feuchtigkeit und sterben schnell ab, wenn sie zu nass stehen.
Gießwasser darf nicht im Untersetzer oder Übertopf belassen werden. Es ist von Vorteil, das Alpenveilchen von unten zu gießen, damit die Knolle nicht mit Gießwasser in Berührung kommt. Liegen die Knollen über der Erde, kann wie gehabt bewässert werden. Bei unterirdischen Knollen ist überschüssiges Gießwasser nach spätestens einer halben Stunde zu entfernen."
        );
        $alpenveilchen->setSubstrateAddinfo(
            "Alpenveilchen wachsen sehr gut in humoser und lehmhaltiger Erde. Gartenerde kann Sand und Torf untergemischt werden."
        );
        $alpenveilchen->setFertiliserAddinfo(
            "Vor und während der Blüte erhält das Alpenveilchen wöchentlich einen handelsüblichen Dünger für Blühpflanzen. Während der Ruhezeit wird nicht gedüngt."
        );
        $alpenveilchen->setFlowerColor("Rosa, Weiß, Rot");
        $alpenveilchen->setCareTips(
            "Das Pflegegeheimnis des Alpenveilchens ließe sich wie folgt zusammenfassen: leichte Feuchte und frische Kühle. Wenn Sie für die hübschen Dauerblüher einen Platz am sonnigen Wohnzimmerfenster vorgesehen haben, werden es Ihnen die Alpenveilchen allerdings kaum danken. Viel wohler fühlen sich die Pflanzen in einem kühlen Schlafzimmer, in einem hellen Flur oder in einem Badezimmer, wo wenig geheizt wird. Werden Alpenveilchen im Inneren zu intensiv bewässert, führt dies zum Faulen der Blatt- und Blütenstiele. Wird das Alpenveilchen in ein Gefäß mit feuchtem Torf gestellt, bleibt das Substrat gleichmäßig feucht."
        );

        $alpenveilchen->setIcon("images/plants/Aloe.png");
        $alpenveilchen->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($alpenveilchen);
        $manager->flush();
        $this->addReference(self::ALPENVEILCHEN, $alpenveilchen);


        /*---------------------------------BEGONIE--------------------------------*/

        $begonie = new Plant();

        $begonie->setName("Begonie");
        $begonie->setAlternativeName("Schiefblatt");
        $begonie->setLatinName("Begonia");
        $begonie->setGenus("Schiefblattgewächse");
        $begonie->setCareLevel("gering");
        $begonie->setWateringAmount("alle 1-2 Tage");
        $begonie->setLocationIcon("hell, keine direkte Sonneneinstrahlung");
        $begonie->setTemperatureIcon("20°C");
        $begonie->setFertiliserIcon("alle 2 Monate");
        $begonie->setSubstrateIcon("Balkonblumenerde + Sand");
        $begonie->setHeydayIcon("das ganze Jahr");
        $begonie->setHeightIcon("300 cm");
        $begonie->setSpecialFeatureIcon("Blüten in unterschiedlichen Farben");
        $begonie->setShortDescription(
            "Blütenbegonien, die für die Zimmerhaltung gezüchtet wurden, 
beistzen viele Blüten. Für diese gibt es eine große Farbauswahl, welche entweder einfärbig oder bunt sein kann."
        );
        $begonie->setLocationAddinfo(
            "Nord- oder Ostfenster. Im Winter ist eine Pflanzenleuchte sinnvoll, die für 
genügend Helligkeit sorgt."
        );
        $begonie->setPot("Topfgröße sollte auf den Wurzelballen abgestimmt werden");
        $begonie->setWateringAmountAddinfo(
        "- regelmäßiges Gießen mit kalkarmem Leitungswasser der destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)
        - die Erde sollte nie ganz austrocknen
        - Blätter freuen sich gelegentlich über lauwarme Sprühdusche
        Achtung
        - fehlt die Feuchtigkeit macht sich Mehltau breit
        - Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen"
        );
        $begonie->setSubstrateAddinfo(
            "- Pflanzenerde mit einem neutralen oder leicht saurem pH-Wert
        Achtung 
        - zu viel Erde führt zur Bildung von Staunässe
        Tipp 
        - Vorsorge gegen Staunässe > Anlegen einer Drainage aus Blähton am Topfboden oder benutzen eines Topfes mit Loch am Boden"
        );
        $begonie->setFertiliserAddinfo("
        - Damit Blattwachstum und Blühfreude erhalten bleiben, brauchen Zimmerbegonien einen wasserlöslichen Dünger.
        Düngzeiten
        - Frühjahrs- und Sommermonaten: 1x pro Monat
        - Winter: in großen Abständen
        Achtung:
        - frisch eingetopfte Pflanzen ca. 3 Monate nicht düngen (handelsübliche Blumenerde erhält bereits Dünger)"
        );
        $begonie->setFlowerColor("Pink, Weiß, Rot, Gelb, Orange, gemischt");
        $begonie->setCareTips("
        Wintertipps: verwende Pflanzenleuchte für genügend Helligkeit und vermeide aufsteigende Heizungsluft (z.B. Fenster mit darunter liegendem Heizkörper)
        Dünger: 1x pro Monat düngen, im Winter seltener"
        );

        $begonie->setIcon("images/plants/Aloe.png");
        $begonie->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($begonie);
        $manager->flush();
        $this->addReference(self::BEGONIE, $begonie);

        /*---------------------------------BLATTBEGONIE--------------------------------*/

        $blattbegonie = new Plant();

        $blattbegonie->setName("Blattbegonie");
        $blattbegonie->setAlternativeName("Schiefblatt");
        $blattbegonie->setLatinName("Begonia bowerae");
        $blattbegonie->setGenus("Schiefblattgewächse");
        $blattbegonie->setCareLevel("gering");
        $blattbegonie->setWateringAmount("alle 1-2 Tage");
        $blattbegonie->setLocationIcon("hell, keine direkte Sonneneinstrahlung");
        $blattbegonie->setTemperatureIcon("20°C");
        $blattbegonie->setFertiliserIcon("alle 2 Monate");
        $blattbegonie->setSubstrateIcon("Balkonblumenerde + Sand");
        $blattbegonie->setHeydayIcon("das ganze Jahr");
        $blattbegonie->setHeightIcon("300 cm");
        $blattbegonie->setSpecialFeatureIcon("verschieden gemaßerte Blätter");
        $blattbegonie->setShortDescription(
            "Die Blattbegonie trägt kaum Blüten, besitzt dafür oft eine 
schöne maserugn in ihren Blättern."
        );
        $blattbegonie->setLocationAddinfo(
            "Nord- oder Ostfenster. Im Winter ist eine Pflanzenleuchte sinnvoll, die für 
genügend Helligkeit sorgt."
        );
        $blattbegonie->setPot("Topfgröße sollte auf den Wurzelballen abgestimmt werden");
        $blattbegonie->setWateringAmountAddinfo(
            "- regelmäßiges Gießen mit kalkarmem Leitungswasser der destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)
        - die Erde sollte nie ganz austrocknen
        - Blätter freuen sich gelegentlich über lauwarme Sprühdusche
        Achtung
        - fehlt die Feuchtigkeit macht sich Mehltau breit
        - Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen"
        );
        $blattbegonie->setSubstrateAddinfo(
            "- Pflanzenerde mit einem neutralen oder leicht saurem pH-Wert
        Achtung 
        - zu viel Erde führt zur Bildung von Staunässe
        Tipp 
        - Vorsorge gegen Staunässe > Anlegen einer Drainage aus Blähton am Topfboden oder benutzen eines Topfes mit Loch am Boden"
        );
        $blattbegonie->setFertiliserAddinfo("
        - Damit Blattwachstum und Blühfreude erhalten bleiben, brauchen Zimmerbegonien einen wasserlöslichen Dünger.
        Düngzeiten
        - Frühjahrs- und Sommermonaten: 1x pro Monat
        - Winter: in großen Abständen
        Achtung:
        - frisch eingetopfte Pflanzen ca. 3 Monate nicht düngen (handelsübliche Blumenerde erhält bereits Dünger)"
        );
        $blattbegonie->setCareTips("
        Wintertipps: verwende Pflanzenleuchte für genügend Helligkeit und vermeide aufsteigende Heizungsluft (z.B. Fenster mit darunter liegendem Heizkörper)
        Dünger: 1x pro Monat düngen, im Winter seltener"
        );

        $blattbegonie->setIcon("images/plants/Aloe.png");
        $blattbegonie->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($blattbegonie);
        $manager->flush();
        $this->addReference(self::BLATTBEGONIE, $blattbegonie);

        /*---------------------------------KOENIGSBEGONIE--------------------------------*/

        $koenigsbegonie = new Plant();

        $koenigsbegonie->setName("Königsbegonie");
        $koenigsbegonie->setAlternativeName("Schiefblatt");
        $koenigsbegonie->setLatinName("Begonia");
        $koenigsbegonie->setGenus("Schiefblattgewächse");
        $koenigsbegonie->setCareLevel("gering");
        $koenigsbegonie->setWateringAmount("alle 1-2 Tage");
        $koenigsbegonie->setLocationIcon("hell, keine direkte Sonneneinstrahlung");
        $koenigsbegonie->setTemperatureIcon("20°C");
        $koenigsbegonie->setFertiliserIcon("alle 2 Monate");
        $koenigsbegonie->setSubstrateIcon("Balkonblumenerde + Sand");
        $koenigsbegonie->setHeydayIcon("das ganze Jahr");
        $koenigsbegonie->setHeightIcon("300 cm");
        $koenigsbegonie->setSpecialFeatureIcon("verschieden gemaßerte Blätter");
        $koenigsbegonie->setShortDescription(
            "Die Königsbegonie ist besonders geeignet als Zimmerpflanze. Sie besitzt viele Blätter. Dies können bunt oder einfärbig sein."
        );
        $koenigsbegonie->setLocationAddinfo(
            "Nord- oder Ostfenster. Im Winter ist eine Pflanzenleuchte sinnvoll, die für 
genügend Helligkeit sorgt."
        );
        $koenigsbegonie->setPot("Topfgröße sollte auf den Wurzelballen abgestimmt werden");
        $koenigsbegonie->setWateringAmountAddinfo(
            "- regelmäßiges Gießen mit kalkarmem Leitungswasser der destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)
        - die Erde sollte nie ganz austrocknen
        - Blätter freuen sich gelegentlich über lauwarme Sprühdusche
        Achtung
        - fehlt die Feuchtigkeit macht sich Mehltau breit
        - Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen"
        );
        $koenigsbegonie->setSubstrateAddinfo(
            "- Pflanzenerde mit einem neutralen oder leicht saurem pH-Wert
        Achtung 
        - zu viel Erde führt zur Bildung von Staunässe
        Tipp 
        - Vorsorge gegen Staunässe > Anlegen einer Drainage aus Blähton am Topfboden oder benutzen eines Topfes mit Loch am Boden"
        );
        $koenigsbegonie->setFertiliserAddinfo("
        - Damit Blattwachstum und Blühfreude erhalten bleiben, brauchen Zimmerbegonien einen wasserlöslichen Dünger.
        Düngzeiten
        - Frühjahrs- und Sommermonaten: 1x pro Monat
        - Winter: in großen Abständen
        Achtung:
        - frisch eingetopfte Pflanzen ca. 3 Monate nicht düngen (handelsübliche Blumenerde erhält bereits Dünger)"
        );
        $koenigsbegonie->setCareTips("
        Wintertipps: verwende Pflanzenleuchte für genügend Helligkeit und vermeide aufsteigende Heizungsluft (z.B. Fenster mit darunter liegendem Heizkörper)
        Dünger: 1x pro Monat düngen, im Winter seltener"
        );

        $koenigsbegonie->setIcon("images/plants/Aloe.png");
        $koenigsbegonie->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($koenigsbegonie);
        $manager->flush();
        $this->addReference(self::KOENIGSBEGONIE, $koenigsbegonie);


        /*---------------------------------WIMPERNBEGONIE--------------------------------*/

        $wimpernbegonie = new Plant();

        $wimpernbegonie->setName("Wimpernbegonie");
        $wimpernbegonie->setAlternativeName("Schiefblatt");
        $wimpernbegonie->setLatinName("Begonia-Rex-Hybride");
        $wimpernbegonie->setGenus("Schiefblattgewächse");
        $wimpernbegonie->setCareLevel("gering");
        $wimpernbegonie->setWateringAmount("alle 1-2 Tage");
        $wimpernbegonie->setLocationIcon("hell, keine direkte Sonneneinstrahlung");
        $wimpernbegonie->setTemperatureIcon("20°C");
        $wimpernbegonie->setFertiliserIcon("alle 2 Monate");
        $wimpernbegonie->setSubstrateIcon("Balkonblumenerde + Sand");
        $wimpernbegonie->setHeydayIcon("das ganze Jahr");
        $wimpernbegonie->setHeightIcon("300 cm");
        $wimpernbegonie->setSpecialFeatureIcon("Blätter erinnern an Wimpern");
        $wimpernbegonie->setShortDescription(
            "Die Wimipernbegonie ist besonders geeignet als Zimmerpflanze. Sie besitzt hellgrüne Blätter, die außen dunkel gezeichnet sind, sodass die Blattoptik einem Auge mit Wimpernkrnaz gleicht."
        );
        $wimpernbegonie->setSpecialFeaturesAddinfo(
            "Sie besitzen keine Blüten dafür zwei-färbige Blätter, die von der Maßerung an ein Auge mit Wimpern erinnern"
        );
        $wimpernbegonie->setLocationAddinfo(
            "Nord- oder Ostfenster. Im Winter ist eine Pflanzenleuchte sinnvoll, die für 
genügend Helligkeit sorgt."
        );
        $wimpernbegonie->setPot("Topfgröße sollte auf den Wurzelballen abgestimmt werden");
        $wimpernbegonie->setWateringAmountAddinfo(
            "- regelmäßiges Gießen mit kalkarmem Leitungswasser der destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)
        - die Erde sollte nie ganz austrocknen
        - Blätter freuen sich gelegentlich über lauwarme Sprühdusche
        Achtung
        - fehlt die Feuchtigkeit macht sich Mehltau breit
        - Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen"
        );
        $wimpernbegonie->setSubstrateAddinfo(
            "- Pflanzenerde mit einem neutralen oder leicht saurem pH-Wert
        Achtung 
        - zu viel Erde führt zur Bildung von Staunässe
        Tipp 
        - Vorsorge gegen Staunässe > Anlegen einer Drainage aus Blähton am Topfboden oder benutzen eines Topfes mit Loch am Boden"
        );
        $wimpernbegonie->setFertiliserAddinfo("
        - Damit Blattwachstum und Blühfreude erhalten bleiben, brauchen Zimmerbegonien einen wasserlöslichen Dünger.
        Düngzeiten
        - Frühjahrs- und Sommermonaten: 1x pro Monat
        - Winter: in großen Abständen
        Achtung:
        - frisch eingetopfte Pflanzen ca. 3 Monate nicht düngen (handelsübliche Blumenerde erhält bereits Dünger)"
        );
        $wimpernbegonie->setFlowerColor("Pink, Weiß, Rot, Gelb, Orange, gemischt");
        $wimpernbegonie->setCareTips("
        Wintertipps: verwende Pflanzenleuchte für genügend Helligkeit und vermeide aufsteigende Heizungsluft (z.B. Fenster mit darunter liegendem Heizkörper)
        Dünger: 1x pro Monat düngen, im Winter seltener"
        );

        $wimpernbegonie->setIcon("images/plants/Aloe.png");
        $wimpernbegonie->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($wimpernbegonie);
        $manager->flush();
        $this->addReference(self::WIMPERNBEGONIE, $wimpernbegonie);


        /*---------------------------------ZIMMERCALLA--------------------------------*/

        $zimmercalla = new Plant();

        $zimmercalla->setName("Zimmercalla");
        $zimmercalla->setAlternativeName("Calla, Kalla oder selten Calla-Lilien");
        $zimmercalla->setLatinName("Zantedeschieae");
        $zimmercalla->setGenus("Zantedeschien");
        $zimmercalla->setCareLevel("hoch");
        $zimmercalla->setWateringAmount("Erde stehts gut feucht");
        $zimmercalla->setLocationIcon("sonnig,keine direkte Sonneneinstrahlung");
        $zimmercalla->setTemperatureIcon("10-14°C");
        $zimmercalla->setFertiliserIcon("alle 2 Wochen");
        $zimmercalla->setSubstrateIcon("Blumenerde");
        $zimmercalla->setHeydayIcon("ab Januar");
        $zimmercalla->setHeightIcon("80 cm");
        $zimmercalla->setSpecialFeatureIcon("sehr wählerisch");
        $zimmercalla->setShortDescription(
            "Die Zimmercalla, oft auch Zimmerkalla geschrieben, gehört zu den schönsten, aber nicht ganz einfach zu pflegenden Zimmerpflanzen."
        );
        $zimmercalla->setSpecialFeaturesAddinfo(
            "Nur wenn Standort und Pflege stimmen, erfreut die Calla den Blumenliebhaber viele Jahre lang mit ihren dekorativen Blüten."
        );
        $zimmercalla->setLocationAddinfo(
            "Zimmercalla braucht viel Licht, verträgt aber keine direkte Sonnenbestrahlung. Im Blumenfenster braucht sie deshalb über Mittag etwas Sonnenschutz.
    Noch besser ist es, wenn Sie die Pflanze den Sommer über im Kübel oder Topf auf die Terrasse stellen. Sorgen Sie aber dafür, dass sie nicht zu viel pralle Sonne bekommt und etwas windgeschützt steht."
        );
        $zimmercalla->setWateringAmountAddinfo(
            "Beim Gießen der Zimmercalla brauchen Sie etwas Fingerspitzengefühl. Vor allem während der Blütezeit darf die Erde niemals austrocknen.
In der Ruhepause nach der Blütezeit darf die Calla nicht mehr gegossen und gedüngt werden. Sie wird dann kühler gestellt und ab Januar wieder an wärmere Temperaturen und Feuchtigkeit gewöhnt."
        );
        $zimmercalla->setSubstrateAddinfo(
            "Zimmerkalla reagiert sehr empfindlich auf Keime und Bakterien in der Pflanzenerde. Sie sollten die Zimmerpflanzen deshalb jedes Frühjahr in ganz frische Blumenerde umtopfen."
        );
        $zimmercalla->setFertiliserAddinfo(
            "Wenn Sie die Calla gerade in ganz neue Erde gepflanzt haben, brauchen Sie zunächst keinen Dünger zu geben. Wächst sie im bisherigen Topf weiter, beginnen Sie mit dem Düngen, sobald sich die ersten grünen Spitzen zeigen. In dieser Zeit düngen Sie die Pflanze alle zwei Wochen.");
        $zimmercalla->setFlowerColor("helles Gelb, Apricot, Pink, dunkles Violett");
        $zimmercalla->setHeydayAddinfo(
            "Die Blütezeit der Calla richtet sich nach Sorte. Im Blumenfenster zeigen sich die ersten Blüten der meisten Zimmercalla-Sorten bereits ab Januar. Die Blütezeit der sommerblühenden Calla beginnt im Mai"
        );
        $zimmercalla->setCareTips(
            "Während der Blüte feucht halten und einmal in der Woche mit Wasser besprühen. Verblühtes und Vertrocknetes abschneiden und nach der Blütezeit austrocknen lassen. Im Topf oder als Blumenzwiebel überwintern"
        );

        $zimmercalla->setIcon("images/plants/Aloe.png");
        $zimmercalla->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($zimmercalla);
        $manager->flush();
        $this->addReference(self::ZIMMERCALLA, $zimmercalla);

        /*---------------------------------GERANIE--------------------------------*/

        $geranie = new Plant();

        $geranie->setName("Geranie");
        $geranie->setLatinName("Pelargonium");
        $geranie->setGenus("Storchschnabelgewächse ");
        $geranie->setCareLevel("gering");
        $geranie->setWateringAmount("2x pro Tag");
        $geranie->setLocationIcon("sonnig bis halbschattig");
        $geranie->setTemperatureIcon("20°C");
        $geranie->setFertiliserIcon("alle 3 bis 4 Wochen");
        $geranie->setSubstrateIcon("Pflanzenerde");
        $geranie->setHeydayIcon("Sommer");
        $geranie->setHeightIcon("150 cm");
        $geranie->setSpecialFeatureIcon("giftig");
        $geranie->setShortDescription(
            "Die Geranie wird gerne in Gärten und am Balkon gehalten. Sie besitzt jedoch auch extra für den Innenraum gezüchtete Varianten wie Edelgeranie udn Schmetterlingsgeranie, die eine einfache Haltung in der Wohnung oder im Haus ermöglicht."
        );
        $geranie->setSpecialFeaturesAddinfo(
            "- besitzen besonders attracktive und große Blüten in vielen unterschiedlichen Farben
            - besitzen Blätter mit gezacktem Rand
            Achtung
            - Geranien sind giftig (Gefahrenquelle für Haustiere"
        );
        $geranie->setLocationAddinfo(
            "Die Geranie braucht großzügig Platz, wo sich die Geranie platzmäßig entfalten kann. Standort sollte unzugänglich für Haustiere sein, da die Geranie für diese giftig ist."
        );
        $geranie->setTemperatureAddinfo(
            "Überwinterung am Besten in einer Garage oder einem   gleichwärtigen Innenraum"
        );
        $geranie->setPot(
            "Sie wird sehr gerne als Balkonpflanze gehalten (kann sich   nach unten entfalten). Jedoch kann man diese auch in der Wohnung in großzügigen Töpfen halten. Sie braucht jedoch viel Platz und einen sonnigen Standort."
        );
        $geranie->setWateringAmountAddinfo(
            "- benötigen viel Wasser
            Achtung: Staunässe
            - Verwendung eines Topfs mit Loch oder einer Drainage (Steine, Blähton oder Sand) am Boden des Topfes bäugt Staunässe vor"
        );
        $geranie->setFertiliserAddinfo("
        - ist die Erde bereits gedüngt, braucht sie erst nach drei bis vier Wochen Dünger
        - in regelmäßigen Abständen düngen, um die Blüten den ganzen Sommer zu erhalten"
        );
        $geranie->setFlowerColor("Lila, Weiß, Rot, Pink, Orange, Gelb, Lavendel, Purpur, zwei-färbig");
        $geranie->setHeydayAddinfo("ganzer Sommer bei entsprechender Düngung");
        $geranie->setCareTips("Regelmäßigs ausputzen der Blüten regt die Blütenbildung zur Höchstleistung an.");

        $geranie->setIcon("images/plants/Aloe.png");
        $geranie->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($geranie);
        $manager->flush();
        $this->addReference(self::GERANIE, $geranie);


        /*---------------------------------EDELGERANIE--------------------------------*/

        $edelgeranie = new Plant();

        $edelgeranie->setName("Edelgeranie");
        $edelgeranie->setLatinName("Pelagonium x grandiflorum");
        $edelgeranie->setGenus("Storchschnabelgewächse");
        $edelgeranie->setCareLevel("gering");
        $edelgeranie->setWateringAmount("2x pro Tag");
        $edelgeranie->setLocationIcon("sonnig bis halbschattig ");
        $edelgeranie->setTemperatureIcon("21-23°C");
        $edelgeranie->setFertiliserIcon("alle 3 bis 4 Wochen");
        $edelgeranie->setSubstrateIcon("Pflanzenerde");
        $edelgeranie->setHeydayIcon("Sommer ");
        $edelgeranie->setHeightIcon("150 cm");
        $edelgeranie->setSpecialFeatureIcon("giftig");
        $edelgeranie->setShortDescription(
            "Die Edelgeranie wurde extra für den Wohnungsgebrauch gezüchtet. Sie besitzt dementsprechend viele Blüten und kann bei richtiger Pflege den ganzen Sommer über blühen. Die Pflege ist einfach, jedoch benötigt sie relativ viel Platz. Sie ist jedoch ungeeignet für Haustierhalter, da sie für diese giftig ist."
        );
        $edelgeranie->setSpecialFeaturesAddinfo(
            "- besitzen besonders attracktive und große Blüten in vielen unterschiedlichen Farben
            - besitzen Blätter mit gezacktem Rand
            Achtung
            - Geranien sind giftig (Gefahrenquelle für Haustiere");
        $edelgeranie->setLocationAddinfo(
            "Die Geranie braucht großzügig Platz, wo sich die Geranie platzmäßig entfalten kann. Standort sollte unzugänglich für Haustiere sein, da die Geranie für diese giftig ist."
        );
        $edelgeranie->setPot(
            "- eine Topfgröße größer als die Größe der Geranie (sie braucht viel Platz)
             - kommen am Besten in einer Blumenampel (hängender Topf) zur Geltung
            - Topf mit Drainage oder Loch im Boden"
        );
        $edelgeranie->setWateringAmountAddinfo(
            "- benötigen viel Wasser
            Achtung: Staunässe
            - Verwendung eines Topfs mit Loch oder einer Drainage (Steine,   Blähton oder Sand) am Boden des Topfes bäugt Staunässe vor"
        );
        $edelgeranie->setFertiliserAddinfo("- ist die Erde bereits gedüngt, braucht sie erst nach drei bis vier Wochen Dünger
            - in regelmäßigen Abständen düngen, um die Blüten den ganzen Sommer zu erhalten"
        );
        $edelgeranie->setFlowerColor("Lila, Weiß, Rot, Pink, Orange, Gelb, Lavendel, Purpur, zwei-färbig");
        $edelgeranie->setHeydayAddinfo("ganzer Sommer bei entsprechender Düngung");
        $edelgeranie->setCareTips("- regelmäßigs ausputzen der Blüten regt die Blütenbildung zur Höchstleistung an");

        $edelgeranie->setIcon("images/plants/Aloe.png");
        $edelgeranie->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($edelgeranie);
        $manager->flush();
        $this->addReference(self::EDELGERANIE, $edelgeranie);


        /*---------------------------------SCHMETTERLINGSGERANIE--------------------------------*/

        $schmetterlingsgeranie = new Plant();

        $schmetterlingsgeranie->setName("Aloe Vera");
        $schmetterlingsgeranie->setAlternativeName("Echte Aloe");
        $schmetterlingsgeranie->setLatinName("Aloe Vera");
        $schmetterlingsgeranie->setGenus("Aloen");
        $schmetterlingsgeranie->setCareLevel("gering");
        $schmetterlingsgeranie->setWateringAmount("500ml");
        $schmetterlingsgeranie->setIcon("images/plants/Aloe.png");
        $schmetterlingsgeranie->setWindowIcon("images/plants/AloeBackground.png");
        $schmetterlingsgeranie->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $schmetterlingsgeranie->setTemperatureIcon("20-25°");
        $schmetterlingsgeranie->setFertiliserIcon("2 bis 4 Wochen");
        $schmetterlingsgeranie->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $schmetterlingsgeranie->setHeydayIcon("Frühling");
        $schmetterlingsgeranie->setHeightIcon("45 – 55 cm");
        $schmetterlingsgeranie->setSpecialFeatureIcon("Heilpflanze");
        $schmetterlingsgeranie->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $schmetterlingsgeranie->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $schmetterlingsgeranie->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $schmetterlingsgeranie->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $schmetterlingsgeranie->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $schmetterlingsgeranie->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $schmetterlingsgeranie->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $schmetterlingsgeranie->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $schmetterlingsgeranie->setFlowerColor("Rot,Gelb, Orange");
        $schmetterlingsgeranie->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $schmetterlingsgeranie->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($schmetterlingsgeranie);
        $manager->flush();
        $this->addReference(self::SCHMETTERLINGSGERANIE, $schmetterlingsgeranie);


        /*---------------------------------GLUECKSFEDER--------------------------------*/

        $gluecksfeder = new Plant();

        $gluecksfeder->setName("Aloe Vera");
        $gluecksfeder->setAlternativeName("Echte Aloe");
        $gluecksfeder->setLatinName("Aloe Vera");
        $gluecksfeder->setGenus("Aloen");
        $gluecksfeder->setCareLevel("gering");
        $gluecksfeder->setWateringAmount("500ml");
        $gluecksfeder->setIcon("images/plants/Aloe.png");
        $gluecksfeder->setWindowIcon("images/plants/AloeBackground.png");
        $gluecksfeder->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $gluecksfeder->setTemperatureIcon("20-25°");
        $gluecksfeder->setFertiliserIcon("2 bis 4 Wochen");
        $gluecksfeder->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $gluecksfeder->setHeydayIcon("Frühling");
        $gluecksfeder->setHeightIcon("45 – 55 cm");
        $gluecksfeder->setSpecialFeatureIcon("Heilpflanze");
        $gluecksfeder->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $gluecksfeder->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $gluecksfeder->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $gluecksfeder->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $gluecksfeder->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $gluecksfeder->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $gluecksfeder->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $gluecksfeder->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $gluecksfeder->setFlowerColor("Rot,Gelb, Orange");
        $gluecksfeder->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $gluecksfeder->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($gluecksfeder);
        $manager->flush();
        $this->addReference(self::GLUECKSFEDER, $gluecksfeder);


        /*---------------------------------CHINESISCHER ROSENEIBISCH--------------------------------*/

        $chinroseneibisch = new Plant();

        $chinroseneibisch->setName("Aloe Vera");
        $chinroseneibisch->setAlternativeName("Echte Aloe");
        $chinroseneibisch->setLatinName("Aloe Vera");
        $chinroseneibisch->setGenus("Aloen");
        $chinroseneibisch->setCareLevel("gering");
        $chinroseneibisch->setWateringAmount("500ml");
        $chinroseneibisch->setIcon("images/plants/Aloe.png");
        $chinroseneibisch->setWindowIcon("images/plants/AloeBackground.png");
        $chinroseneibisch->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $chinroseneibisch->setTemperatureIcon("20-25°");
        $chinroseneibisch->setFertiliserIcon("2 bis 4 Wochen");
        $chinroseneibisch->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $chinroseneibisch->setHeydayIcon("Frühling");
        $chinroseneibisch->setHeightIcon("45 – 55 cm");
        $chinroseneibisch->setSpecialFeatureIcon("Heilpflanze");
        $chinroseneibisch->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $chinroseneibisch->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $chinroseneibisch->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $chinroseneibisch->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $chinroseneibisch->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $chinroseneibisch->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $chinroseneibisch->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $chinroseneibisch->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $chinroseneibisch->setFlowerColor("Rot,Gelb, Orange");
        $chinroseneibisch->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $chinroseneibisch->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($chinroseneibisch);
        $manager->flush();
        $this->addReference(self::CHINROSENEIBISCH, $chinroseneibisch);


        /*---------------------------------HAWAIPALME--------------------------------*/

        $hawaipalme = new Plant();

        $hawaipalme->setName("Aloe Vera");
        $hawaipalme->setAlternativeName("Echte Aloe");
        $hawaipalme->setLatinName("Aloe Vera");
        $hawaipalme->setGenus("Aloen");
        $hawaipalme->setCareLevel("gering");
        $hawaipalme->setWateringAmount("500ml");
        $hawaipalme->setIcon("images/plants/Aloe.png");
        $hawaipalme->setWindowIcon("images/plants/AloeBackground.png");
        $hawaipalme->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $hawaipalme->setTemperatureIcon("20-25°");
        $hawaipalme->setFertiliserIcon("2 bis 4 Wochen");
        $hawaipalme->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $hawaipalme->setHeydayIcon("Frühling");
        $hawaipalme->setHeightIcon("45 – 55 cm");
        $hawaipalme->setSpecialFeatureIcon("Heilpflanze");
        $hawaipalme->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $hawaipalme->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $hawaipalme->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $hawaipalme->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $hawaipalme->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $hawaipalme->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $hawaipalme->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $hawaipalme->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $hawaipalme->setFlowerColor("Rot,Gelb, Orange");
        $hawaipalme->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $hawaipalme->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($hawaipalme);
        $manager->flush();
        $this->addReference(self::HAWAIPALME, $hawaipalme);


        /*---------------------------------KATZENGRAS--------------------------------*/

        $katzengras = new Plant();

        $katzengras->setName("Aloe Vera");
        $katzengras->setAlternativeName("Echte Aloe");
        $katzengras->setLatinName("Aloe Vera");
        $katzengras->setGenus("Aloen");
        $katzengras->setCareLevel("gering");
        $katzengras->setWateringAmount("500ml");
        $katzengras->setIcon("images/plants/Aloe.png");
        $katzengras->setWindowIcon("images/plants/AloeBackground.png");
        $katzengras->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $katzengras->setTemperatureIcon("20-25°");
        $katzengras->setFertiliserIcon("2 bis 4 Wochen");
        $katzengras->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $katzengras->setHeydayIcon("Frühling");
        $katzengras->setHeightIcon("45 – 55 cm");
        $katzengras->setSpecialFeatureIcon("Heilpflanze");
        $katzengras->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $katzengras->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $katzengras->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $katzengras->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $katzengras->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $katzengras->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $katzengras->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $katzengras->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $katzengras->setFlowerColor("Rot,Gelb, Orange");
        $katzengras->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $katzengras->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($katzengras);
        $manager->flush();
        $this->addReference(self::KATZENGRAS, $katzengras);


        /*---------------------------------VENUSFLIEGENFALLE--------------------------------*/

        $venusfliegenfalle = new Plant();

        $venusfliegenfalle->setName("Aloe Vera");
        $venusfliegenfalle->setAlternativeName("Echte Aloe");
        $venusfliegenfalle->setLatinName("Aloe Vera");
        $venusfliegenfalle->setGenus("Aloen");
        $venusfliegenfalle->setCareLevel("gering");
        $venusfliegenfalle->setWateringAmount("500ml");
        $venusfliegenfalle->setIcon("images/plants/Aloe.png");
        $venusfliegenfalle->setWindowIcon("images/plants/AloeBackground.png");
        $venusfliegenfalle->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $venusfliegenfalle->setTemperatureIcon("20-25°");
        $venusfliegenfalle->setFertiliserIcon("2 bis 4 Wochen");
        $venusfliegenfalle->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $venusfliegenfalle->setHeydayIcon("Frühling");
        $venusfliegenfalle->setHeightIcon("45 – 55 cm");
        $venusfliegenfalle->setSpecialFeatureIcon("Heilpflanze");
        $venusfliegenfalle->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $venusfliegenfalle->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $venusfliegenfalle->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $venusfliegenfalle->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $venusfliegenfalle->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $venusfliegenfalle->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $venusfliegenfalle->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $venusfliegenfalle->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $venusfliegenfalle->setFlowerColor("Rot,Gelb, Orange");
        $venusfliegenfalle->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $venusfliegenfalle->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($venusfliegenfalle);
        $manager->flush();
        $this->addReference(self::VENUSFLIEGENFALLE, $venusfliegenfalle);


        /*---------------------------------NARZISSE--------------------------------*/

        $narzisse = new Plant();

        $narzisse->setName("Aloe Vera");
        $narzisse->setAlternativeName("Echte Aloe");
        $narzisse->setLatinName("Aloe Vera");
        $narzisse->setGenus("Aloen");
        $narzisse->setCareLevel("gering");
        $narzisse->setWateringAmount("500ml");
        $narzisse->setIcon("images/plants/Aloe.png");
        $narzisse->setWindowIcon("images/plants/AloeBackground.png");
        $narzisse->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $narzisse->setTemperatureIcon("20-25°");
        $narzisse->setFertiliserIcon("2 bis 4 Wochen");
        $narzisse->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $narzisse->setHeydayIcon("Frühling");
        $narzisse->setHeightIcon("45 – 55 cm");
        $narzisse->setSpecialFeatureIcon("Heilpflanze");
        $narzisse->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $narzisse->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $narzisse->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $narzisse->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $narzisse->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $narzisse->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $narzisse->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $narzisse->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $narzisse->setFlowerColor("Rot,Gelb, Orange");
        $narzisse->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $narzisse->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($narzisse);
        $manager->flush();
        $this->addReference(self::NARZISSE, $narzisse);


        /*---------------------------------ORCHIDEE--------------------------------*/

        $ochidee = new Plant();

        $ochidee->setName("Aloe Vera");
        $ochidee->setAlternativeName("Echte Aloe");
        $ochidee->setLatinName("Aloe Vera");
        $ochidee->setGenus("Aloen");
        $ochidee->setCareLevel("gering");
        $ochidee->setWateringAmount("500ml");
        $ochidee->setIcon("images/plants/Aloe.png");
        $ochidee->setWindowIcon("images/plants/AloeBackground.png");
        $ochidee->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $ochidee->setTemperatureIcon("20-25°");
        $ochidee->setFertiliserIcon("2 bis 4 Wochen");
        $ochidee->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $ochidee->setHeydayIcon("Frühling");
        $ochidee->setHeightIcon("45 – 55 cm");
        $ochidee->setSpecialFeatureIcon("Heilpflanze");
        $ochidee->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $ochidee->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $ochidee->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $ochidee->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $ochidee->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $ochidee->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $ochidee->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $ochidee->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $ochidee->setFlowerColor("Rot,Gelb, Orange");
        $ochidee->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $ochidee->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($ochidee);
        $manager->flush();
        $this->addReference(self::ORCHIDEE, $ochidee);


        /*---------------------------------WEIHNACHTSSTERN--------------------------------*/

        $weichnachtsstern = new Plant();

        $weichnachtsstern->setName("Aloe Vera");
        $weichnachtsstern->setAlternativeName("Echte Aloe");
        $weichnachtsstern->setLatinName("Aloe Vera");
        $weichnachtsstern->setGenus("Aloen");
        $weichnachtsstern->setCareLevel("gering");
        $weichnachtsstern->setWateringAmount("500ml");
        $weichnachtsstern->setIcon("images/plants/Aloe.png");
        $weichnachtsstern->setWindowIcon("images/plants/AloeBackground.png");
        $weichnachtsstern->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $weichnachtsstern->setTemperatureIcon("20-25°");
        $weichnachtsstern->setFertiliserIcon("2 bis 4 Wochen");
        $weichnachtsstern->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $weichnachtsstern->setHeydayIcon("Frühling");
        $weichnachtsstern->setHeightIcon("45 – 55 cm");
        $weichnachtsstern->setSpecialFeatureIcon("Heilpflanze");
        $weichnachtsstern->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $weichnachtsstern->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $weichnachtsstern->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $weichnachtsstern->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $weichnachtsstern->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $weichnachtsstern->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $weichnachtsstern->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $weichnachtsstern->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $weichnachtsstern->setFlowerColor("Rot,Gelb, Orange");
        $weichnachtsstern->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $weichnachtsstern->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($weichnachtsstern);
        $manager->flush();
        $this->addReference(self::WEIHNACHTSSTERN, $weichnachtsstern);


        /*---------------------------------YUCCA-PALME--------------------------------*/

        $yuccapalme = new Plant();

        $yuccapalme->setName("Aloe Vera");
        $yuccapalme->setAlternativeName("Echte Aloe");
        $yuccapalme->setLatinName("Aloe Vera");
        $yuccapalme->setGenus("Aloen");
        $yuccapalme->setCareLevel("gering");
        $yuccapalme->setWateringAmount("500ml");
        $yuccapalme->setIcon("images/plants/Aloe.png");
        $yuccapalme->setWindowIcon("images/plants/AloeBackground.png");
        $yuccapalme->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $yuccapalme->setTemperatureIcon("20-25°");
        $yuccapalme->setFertiliserIcon("2 bis 4 Wochen");
        $yuccapalme->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $yuccapalme->setHeydayIcon("Frühling");
        $yuccapalme->setHeightIcon("45 – 55 cm");
        $yuccapalme->setSpecialFeatureIcon("Heilpflanze");
        $yuccapalme->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $yuccapalme->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $yuccapalme->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $yuccapalme->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $yuccapalme->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $yuccapalme->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $yuccapalme->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $yuccapalme->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $yuccapalme->setFlowerColor("Rot,Gelb, Orange");
        $yuccapalme->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $yuccapalme->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($yuccapalme);
        $manager->flush();
        $this->addReference(self::YUCCAPALME, $yuccapalme);


        /*---------------------------------Schwertfarn--------------------------------*/

        $schwertfarn = new Plant();

        $schwertfarn->setName("Aloe Vera");
        $schwertfarn->setAlternativeName("Echte Aloe");
        $schwertfarn->setLatinName("Aloe Vera");
        $schwertfarn->setGenus("Aloen");
        $schwertfarn->setCareLevel("gering");
        $schwertfarn->setWateringAmount("500ml");
        $schwertfarn->setIcon("images/plants/Aloe.png");
        $schwertfarn->setWindowIcon("images/plants/AloeBackground.png");
        $schwertfarn->setLocationIcon("sonnig, auch direkte Sonneneinstrahlung");
        $schwertfarn->setTemperatureIcon("20-25°");
        $schwertfarn->setFertiliserIcon("2 bis 4 Wochen");
        $schwertfarn->setSubstrateIcon("Kakteen-  Sukkulentenerde");
        $schwertfarn->setHeydayIcon("Frühling");
        $schwertfarn->setHeightIcon("45 – 55 cm");
        $schwertfarn->setSpecialFeatureIcon("Heilpflanze");
        $schwertfarn->setShortDescription("Die Echte Aloe, auch als Wüstenlilie bekannt, wird unter Pflanzenfreunden als dekorative, immergrüne Zierpflanze sehr geschätzt. ");
        $schwertfarn->setSpecialFeaturesAddinfo("In ihren fleischigen, grau-grünen Blättern speichert sie Wasser, das zu Gel umgewandelt wird. Daraus werden Arznei, Kosmetika und Nahrungsergänzungsmittel gewonnen. Die Aloe ist eine genügsame, pflegeleichte Pflanze, die über lange Zeit auch ohne Wasser auskommt.");
        $schwertfarn->setLocationAddinfo("Die Aloe Vera liebt warme, helle Plätze. Auch Halbschatten verträgt sie gut. Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Achten Sie hier auf einen sonnigen Standort, pralle Sonne kann ihr nichts anhaben. Allerdings sollten Sie dem Gewächs eine 14tägige Gewöhnungsphase im Halbschatten einräumen.");
        $schwertfarn->setTemperatureAddinfo("Im Sommer können Sie die Wüstenlilie auch ins Freie auf die Terrasse oder in den Garten stellen. Im Herbst holen Sie die Aloe vera wieder ins Haus, denn Kälte und Frost verträgt sie nicht. Hervorragend überwintert das Gewächs an einem hellen Platz, bei Temperaturen von mehr als 10 °C Celsius.");
        $schwertfarn->setPot("Empfehlenswert ist ein schweres Pflanzgefäß. Es sollte oben und unten den gleichen Durchmesser haben, damit der Kübel später nicht umfallen kann.");
        $schwertfarn->setWateringAmountAddinfo("- regelmäßiges Gießen mit kalkarmem Leitungswasser doer destilliertem Wasser, das Zimmertemperatur hat (schont die Pflanzen)- die Erde sollte nie ganz austrocknen- Blätter freuen sich gelegentlich über lauwarme Sprühdusche. Achtung: - fehlt die Feuchtigkeit macht sich Mehltau breit- Nässe von unten schadet der Begonie (leeren Sie den Untersetzer (bei Lochtopf) immer nach dem Gießen");
        $schwertfarn->setSubstrateAddinfo("Die Pflanzerde muss durchlässig, trocken und etwas kalkhaltig sein. Normale Blumenerde mischen Sie mit Granitsplitt, Perlite und groben Sand. Gut bewährt haben sich auch Kakteen- oder Sukkulentenerde. Wichtig ist, die Erde muss nährstoffarm sein. Außerdem ist einen Drainage im Kübel ratsam, damit überschüssiges Wasser ablaufen und keine Staunässe entstehen kann. Hierfür verwenden Sie Granitsplitt oder groben Kies.");
        $schwertfarn->setFertiliserAddinfo("Während der Wachstumsphase im Sommer düngen Sie die Echte Aloe alle 2 bis 4 Wochen mit einem Sukkulentendünger. Nur im Winter wird die Pflanze nicht mit Nähstoffen versorgt.");
        $schwertfarn->setFlowerColor("Rot,Gelb, Orange");
        $schwertfarn->setHeydayAddinfo("loe vera blüht mit Erreichen der Geschlechtsreife jedes Jahr im Frühling. Die pflegeleichte Zimmerpflanze benötigt dazu keine besonderen Bedingungen. Ein kühler Standort im Winter ist jedoch für die Blütenbildung förderlich.");
        $schwertfarn->setCareTips("Die Pflanze mäßig gießen, um das Substrat zwischenzeitlich gut antrocknen zu lassen. Vorzugsweise kalkarmes Wasser verwenden, das von unten verabreicht wird. Von März bis Oktober alle 4 Wochen flüssigen Kakteendünger applizieren Vergilbte, eingezogene Blätter am äußeren Rand anschneiden und herausdrehen");

        $manager->persist($schwertfarn);
        $manager->flush();
        $this->addReference(self::SCHWERTFARN, $schwertfarn);

    }

    public function getOrder()
    {
        return 100;
    }
}


