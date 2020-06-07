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

        $plant->setLinkName("aloeVera");

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

        $alpenveilchen->setLinkName("alpenveilchen");

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

        $alpenveilchen->setIcon("images/plants/Alpenveilchen.png");
        $alpenveilchen->setWindowIcon("images/plants/AlpenveilchenBackground.png");

        $manager->persist($alpenveilchen);
        $manager->flush();
        $this->addReference(self::ALPENVEILCHEN, $alpenveilchen);


        /*---------------------------------BEGONIE--------------------------------*/

        $begonie = new Plant();

        $begonie->setLinkName("begonie");

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

        $begonie->setIcon("images/plants/Begonie.png");
        $begonie->setWindowIcon("images/plants/BegonieBackground.png");

        $manager->persist($begonie);
        $manager->flush();
        $this->addReference(self::BEGONIE, $begonie);

        /*---------------------------------BLATTBEGONIE--------------------------------*/

        $blattbegonie = new Plant();

        $blattbegonie->setLinkName("blattbegonie");

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

        $blattbegonie->setIcon("images/plants/Begonie.png");
        $blattbegonie->setWindowIcon("images/plants/BegonieBackground.png");

        $manager->persist($blattbegonie);
        $manager->flush();
        $this->addReference(self::BLATTBEGONIE, $blattbegonie);

        /*---------------------------------KOENIGSBEGONIE--------------------------------*/

        $koenigsbegonie = new Plant();

        $koenigsbegonie->setLinkName("koenigsbegonie");

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

        $koenigsbegonie->setIcon("images/plants/Begonie.png");
        $koenigsbegonie->setWindowIcon("images/plants/BegonieBackground.png");

        $manager->persist($koenigsbegonie);
        $manager->flush();
        $this->addReference(self::KOENIGSBEGONIE, $koenigsbegonie);


        /*---------------------------------WIMPERNBEGONIE--------------------------------*/

        $wimpernbegonie = new Plant();

        $wimpernbegonie->setLinkName("wimpernbegonie");

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

        $wimpernbegonie->setIcon("images/plants/Begonie.png");
        $wimpernbegonie->setWindowIcon("images/plants/BegonieBackground.png");

        $manager->persist($wimpernbegonie);
        $manager->flush();
        $this->addReference(self::WIMPERNBEGONIE, $wimpernbegonie);


        /*---------------------------------ZIMMERCALLA--------------------------------*/

        $zimmercalla = new Plant();

        $zimmercalla->setLinkName("zimmercalla");

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

        $zimmercalla->setIcon("images/plants/Calla.png");
        $zimmercalla->setWindowIcon("images/plants/CallaBackground.png");

        $manager->persist($zimmercalla);
        $manager->flush();
        $this->addReference(self::ZIMMERCALLA, $zimmercalla);

        /*---------------------------------GERANIE--------------------------------*/

        $geranie = new Plant();

        $geranie->setLinkName("geranie");

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

        $edelgeranie->setLinkName("edelgeranie");

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

        $schmetterlingsgeranie->setLinkName("schmetterlingsgeranie");

        $schmetterlingsgeranie->setName("Schmetterlingsgeranie");
        $schmetterlingsgeranie->setAlternativeName("Duftgeranien");
        $schmetterlingsgeranie->setLatinName("Pelagonium papilionaceum");
        $schmetterlingsgeranie->setGenus("Storchschnabelgewächse ");
        $schmetterlingsgeranie->setCareLevel("gering");
        $schmetterlingsgeranie->setWateringAmount("2x pro Tag");
        $schmetterlingsgeranie->setLocationIcon("sonnig bis halbschattig");
        $schmetterlingsgeranie->setTemperatureIcon("21-23°C");
        $schmetterlingsgeranie->setFertiliserIcon("alle 3 bis 4 Wochen");
        $schmetterlingsgeranie->setSubstrateIcon("Pflazenerde");
        $schmetterlingsgeranie->setHeydayIcon("Sommer");
        $schmetterlingsgeranie->setHeightIcon("150 cm");
        $schmetterlingsgeranie->setSpecialFeatureIcon("giftig");
        $schmetterlingsgeranie->setShortDescription(
            "Die Edelgeranie wurde extra für den Wohnungsgebrauch gezüchtet. Sie besitzt dementsprechend viele Blüten und kann bei richtiger Pflege den ganzen Sommer über blühen. Die Pflege ist einfach, jedoch benötigt sie relativ viel Platz. Sie besitzt unterschiedliche Düfte, die je nach Geschmack des Besitzers ausgewählt werden können.
        Achtung: Sie ist jedoch ungeeignet für Haustierhalter, da sie für diese giftig ist.. "
        );
        $schmetterlingsgeranie->setSpecialFeaturesAddinfo(
            "- besitzen besonders attraktive und große Blüten in vielen unterschiedlichen Farben
            - besitzen Blätter mit gezacktem Rand
            - besitzen einen angenehmen Duft (reicht von 'Chocolate Peppermint' (Schoko-Minz-Aroma) bis 'Purple Uniqu' (Weingummi-Aroma)
            Achtung
            - Geranien sind giftig (Gefahrenquelle für Haustiere)"
        );
        $schmetterlingsgeranie->setLocationAddinfo(
            "Die Geranie braucht großzügig Platz, wo sich die Geranie platzmäßig entfalten kann. Standort sollte unzugänglich für Haustiere sein, da die Geranie für diese giftig ist."
        );
        $schmetterlingsgeranie->setPot(
            "- eine Topfgröße größer als die Größe der Geranie (sie braucht viel Platz)
            - kommen am Besten in einer Blumenampel (hängender Topf) zur Geltung
            - Topf mit Drainage oder Loch im Boden"
        );
        $schmetterlingsgeranie->setWateringAmountAddinfo(
            "- benötigen viel Wasser
            Achtung: Staunässe
            - Verwendung eines Topfs mit Loch oder einer Drainage (Steine, Blähton oder Sand) am Boden des Topfes bäugt Staunässe vor"
        );
        $schmetterlingsgeranie->setFertiliserAddinfo(
            "- ist die Erde bereits gedüngt, braucht sie erst nach drei bis vier Wochen Dünger
            - in regelmäßigen Abständen düngen, um die Blüten den   ganzen Sommer zu erhalten"
        );
        $schmetterlingsgeranie->setFlowerColor("Lila, Weiß, Rot, Pink, Orange, Gelb, Lavendel, Purpur, zwei-färbig");
        $schmetterlingsgeranie->setHeydayAddinfo("ganzer Sommer bei entsprechender Düngung");
        $schmetterlingsgeranie->setCareTips("- regelmäßigs ausputzen der Blüten regt die Blütenbildung zur Höchstleistung an");

        $schmetterlingsgeranie->setIcon("images/plants/Aloe.png");
        $schmetterlingsgeranie->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($schmetterlingsgeranie);
        $manager->flush();
        $this->addReference(self::SCHMETTERLINGSGERANIE, $schmetterlingsgeranie);


        /*---------------------------------GLUECKSFEDER--------------------------------*/

        $gluecksfeder = new Plant();

        $gluecksfeder->setLinkName("gluecksfeder");

        $gluecksfeder->setName("Glücksfeder");
        $gluecksfeder->setLatinName("Zamioculcas zamiifolia");
        $gluecksfeder->setGenus("Aronstabgewächse");
        $gluecksfeder->setCareLevel("gering");
        $gluecksfeder->setWateringAmount("alle 2-4 Wochen");
        $gluecksfeder->setLocationIcon("hell bis halbschattig");
        $gluecksfeder->setTemperatureIcon("21-23°");
        $gluecksfeder->setFertiliserIcon("März - Oktober: 1x monatlich ");
        $gluecksfeder->setSubstrateIcon("Pflanzenerde");
        $gluecksfeder->setHeightIcon("60-90 cm");
        $gluecksfeder->setSpecialFeatureIcon("Leicht Giftig");
        $gluecksfeder->setShortDescription(
            "Die Glücksfeder ist eine pflegeleichte Kübelpflanze, die auch bei einem Gartenanfänger Einzug halten kann. Denn auch wenn ab und zu das Gießen einmal vergessen wird, zieht sich die Pflanze die Feuchtigkeit aus den Rhizomen. Auch an das Substrat oder den Dünger stellt die Pflanze keine großen Ansprüche. Der Standort ist optimal, wenn die Glücksfeder morgens und abends ein wenig Sonneneinstrahlung erhält, ansonsten darf sie auch dunkel stehen."
        );
        $gluecksfeder->setSpecialFeaturesAddinfo(
            "Erst seit wenigen Jahren ist diese pflegeleichte Blattschmuckpflanze bei uns im Handel erhältlich. Sie gilt in allen Pflanzenteilen als schwach giftig. Kommen Pflanzenteile mit Schleimhäuten in Berührung, kann es zu Brennen und Jucken, aber auch zu Rötungen führen. Deshalb ist besondere Vorsicht hinsichtlich Kindern und Haustieren geboten."
        );
        $gluecksfeder->setLocationAddinfo("auf einem Regal gegenübereinem Fenster, Zimmerecke mit wenig Licht");
        $gluecksfeder->setPot("Topf nicht zu groß");
        $gluecksfeder->setWateringAmountAddinfo("Vorsichtig Gießen: nicht zu viel Wasser");
        $gluecksfeder->setFertiliserAddinfo("regelmäßig Düngen in der Vegetationsphase von März bis Oktober: einmal im Monat");
        $gluecksfeder->setCareTips(
            "Die Glücksfeder ist eine pflegeleichte Kübelpflanze, die auch bei einem Gartenanfänger Einzug halten kann. Denn auch wenn ab und zu das Gießen einmal vergessen wird, zieht sich die Pflanze die Feuchtigkeit aus den Rhizomen. Auch an das Substrat oder den Dünger stellt die Pflanze keine großen Ansprüche. Der Standort ist optimal, wenn die Glücksfeder morgens und abends ein wenig Sonneneinstrahlung erhält, ansonsten darf sie auch dunkel stehen."
        );

        $gluecksfeder->setIcon("images/plants/Aloe.png");
        $gluecksfeder->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($gluecksfeder);
        $manager->flush();
        $this->addReference(self::GLUECKSFEDER, $gluecksfeder);


        /*---------------------------------CHINESISCHER ROSENEIBISCH--------------------------------*/

        $chinroseneibisch = new Plant();

        $chinroseneibisch->setLinkName("chinesischeRoseneibisch");

        $chinroseneibisch->setName("Chinesische Roseneibisch");
        $chinroseneibisch->setAlternativeName("Chinesische Rose, Zimmer-Hibiskus oder einfach Hibiskus ");
        $chinroseneibisch->setLatinName("Hibiscus rosa-sinensis");
        $chinroseneibisch->setGenus("Hibiskus");
        $chinroseneibisch->setCareLevel("hoch");
        $chinroseneibisch->setWateringAmount("regelmäßig alle 1-2 Tage");
        $chinroseneibisch->setLocationIcon("sonnig, keine Mittagsonne");
        $chinroseneibisch->setTemperatureIcon("15-18°C");
        $chinroseneibisch->setFertiliserIcon("März - Auust: alle 2 Wochen");
        $chinroseneibisch->setSubstrateIcon("Blumenerde");
        $chinroseneibisch->setHeydayIcon("Juni - September");
        $chinroseneibisch->setHeightIcon("100 – 300 cm");
        $chinroseneibisch->setSpecialFeatureIcon("sehr pflegeaufwendig");
        $chinroseneibisch->setShortDescription("Ursprünglich aus Südostasien stammend, ist der Chinesische Hibiskus, bot. Hibiscus rosa sinensis, mittlerweile eine beliebte Zimmerpflanze. Mit der richtigen Pflege entwickelt er sich zu einer gesunden Pflanze, die uns immer wieder mit ihren zauberhaften Blüten erfreut.");
        $chinroseneibisch->setSpecialFeaturesAddinfo("Für Anfänger im Bereich der Gartengestaltung ist er nicht geeignet, da er sehr pflegeaufwändig ist. Mit dem richtigen Knowhow bezüglich seiner Wünsche jedoch holt man sich mit dem Roseneibisch eine Pflanze ins Haus, an der man viele Jahre lang Freude haben wird.");
        $chinroseneibisch->setLocationAddinfo("Der Chinesische Hibiskus fühlt sich wohl an einem hellen, sonnigen Platz. Also ruhig auf der Fensterbank, aber nicht unbedingt in der Mittagssonne. Wenn Du für ausreichend Wasser und Luftfeuchtigkeit sorgst, verträgt der Hibiskus auch die Nähe zur Heizung gut. Während der Blüte darf der Hibiskus auf keinen Fall umgestellt werden, da er sonst die Blüten abwirft");
        $chinroseneibisch->setTemperatureAddinfo("Winterhart bis -20°C, in Kübelhaltung in helles Winterquartier bringen");
        $chinroseneibisch->setPot("Kleine Pflanzen kannst Du jedes Jahr im Frühjahr in etwas größere Gefäße umtopfen. Große Pflanzen verbleiben in ihren Töpfen, hier wird nur die Erde ausgetauscht. Als Substrat verwendest Du handelsübliche Blumenerde. Die Wurzeln werden beim Umtopfen aufgelockert und leicht zurückgeschnitten.");
        $chinroseneibisch->setWateringAmountAddinfo("Der Hibiskus muss regelmäßig gegossen werden. Da der Hibiskus keine Staunässe verträgt, solltest Du die Erde vor dem erneuten Gießen abtrocknen lassen und eventuell überflüssiges Wasser aus dem Übertopf und Untersetzer abgießen.");
        $chinroseneibisch->setSubstrateAddinfo("nährstoffreich; durchlässig; kalkhaltig");
        $chinroseneibisch->setFertiliserAddinfo("In der Wachstumsperiode von März bis August sollte der Hibiskus alle zwei Wochen mit einem Flüssigdünger versorgt werden. Während der Winterruhe wird das Düngen eingestellt.");
        $chinroseneibisch->setFlowerColor("Rot, Rosa, Gelb");
        $chinroseneibisch->setCareTips("Den Roseneibisch hält man am besten als Kübelpflanze, da er bei uns nicht winterhart ist. Nach den Eisheiligen kann man ihn ins Freie stellen: Er braucht allerdings einen geschützten, warmen Platz, der aber nicht in der prallen Sonne, sondern im Halbschatten liegen sollte, da der Roseneibisch eine hohe Luftfeuchtigkeit braucht. An trocken-heißen Tagen sollte man ihn deshalb immer etwas mit der Sprühflasche einnebeln. Außerdem sollte man ihn während der Sommermonate reichlich gießen. Im Herbst kommt er dann wieder ins Winterquartier bei 12 bis 15 Grad Celsius. Im Winter wird er trockener gehalten und seltener gegossen und gedüngt. Der Roseneibisch lässt sich durch Stecklinge vegetativ vermehren, die man zwischen April und Mai oder zwischen Juli und August schneidet und bei Temperaturen zwischen 18 und 21 Grad Celsius wurzeln lässt.");

        $chinroseneibisch->setIcon("images/plants/Aloe.png");
        $chinroseneibisch->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($chinroseneibisch);
        $manager->flush();
        $this->addReference(self::CHINROSENEIBISCH, $chinroseneibisch);


        /*---------------------------------HAWAIPALME--------------------------------*/

        $hawaipalme = new Plant();

        $hawaipalme->setLinkName("hawaipalme");

        $hawaipalme->setName("Hawaipalme");
        $hawaipalme->setAlternativeName("Vulkanpalme");
        $hawaipalme->setLatinName("Brighamia insignis");
        $hawaipalme->setGenus("Glockenblumengewächse");
        $hawaipalme->setCareLevel("hoch");
        $hawaipalme->setWateringAmount("selten aber dafür durchdringend gießen, vor dem gießen trocknen lassen");
        $hawaipalme->setLocationIcon("hell, keine direkte Sonneneinstrahlung");
        $hawaipalme->setTemperatureIcon("18°C");
        $hawaipalme->setFertiliserIcon("alle 8 Wochen (Winter: jede Woche)");
        $hawaipalme->setSubstrateIcon("Kakteenerde");
        $hawaipalme->setHeydayIcon("Herbst");
        $hawaipalme->setHeightIcon("100 – 300 cm");
        $hawaipalme->setSpecialFeatureIcon("vom Aussterben bedroht - seltene Zimmerpflanze");
        $hawaipalme->setShortDescription("Die Hawaiipalme ist eigentlich keine Palme, sondern eine Sukkulente, die in den Wintermonaten ihre schönen gelben Blüten präsentiert.");
        $hawaipalme->setLocationAddinfo("Haiwaiipalmen beginnen im Herbst zu wachsen, deshalb benötigen sie über den Winter mehr 
Licht als im Sommer. Während sie in der kalten Jahreszeit einen sehr hellen Standort bevorzugt, sollte man sie im Sommer lieber in den Halbschatten stellen, gerne auch schattig auf Balkon oder Terrasse. Wie bei Palmen, sollte auch die Erde der Brighamia durchdringend gegossen werden. Bis zum nächsten Gießgang sollte das Substrat dann gut abtrocknen. Bedenken Sie, dass die Pflanze in ihrem Stamm Wasser für etwa 6 Wochen sammeln kann. Je weniger Blätter die Hawaiipalme hat, desto geringer ist ihr Wasserbedarf, deshalb sollten Sie die Pflanze im Sommer weitgehenst trocken halten. Im Winter sollte monatlich gedüngt werden, im Sommer nur etwa alle acht.");
        $hawaipalme->setFertiliserAddinfo(" Im Winter sollte monatlich gedüngt werden, im Sommer nur etwa alle acht Wochen.");
        $hawaipalme->setFlowerColor("Grün, Gelb");
        $hawaipalme->setCareTips("Pflegetipps??");

        $hawaipalme->setIcon("images/plants/Aloe.png");
        $hawaipalme->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($hawaipalme);
        $manager->flush();
        $this->addReference(self::HAWAIPALME, $hawaipalme);


        /*---------------------------------KATZENGRAS--------------------------------*/

        $katzengras = new Plant();

        $katzengras->setLinkName("katzengras");
        
        $katzengras->setName("Katzengras");
        $katzengras->setAlternativeName("Zyperngras");
        $katzengras->setLatinName("Cyperus zumula");
        $katzengras->setGenus("Sumpfgewächse");
        $katzengras->setCareLevel("gering");
        $katzengras->setWateringAmount("stets feucht, keine Staunässe");
        $katzengras->setLocationIcon("hell, keine direkte Sonneneinstrahlung");
        $katzengras->setTemperatureIcon("20-23°C");
        $katzengras->setFertiliserIcon("kein Dünger");
        $katzengras->setSubstrateIcon("Gartenerde");
        $katzengras->setHeightIcon("30 – 70 cm");
        $katzengras->setShortDescription("Das Zyperngras, oft auch nur unter Katzengras bekannt, zählt zu den Sumpfgewächsen und ist bei vielen Katzenfreunden bekannt und beliebt. Mit seinen langen, dünnen und zarten Blättern ist dieses Gras nicht nur besonders dekorativ, auch Katzen haben Freude an dieser Pflanze. Denn für Haustiere eignet sich das Zyperngras als ideale Nahrungsergänzung.");
        $katzengras->setWateringAmountAddinfo("liebt Feuchtigkeit, reichlich gießen und sogar besprühen, steht gerne im Wasser");
        $katzengras->setSubstrateAddinfo("Anzuchterde ist keimfrei und nährstoffarm und deshalb besonders gut geeignet. Alternativ kann ein nährstoffarmes, wasser- und luftdurchlässiges Substrat genutzt werden.");
        $katzengras->setCareTips("Pflegetipps???");

        $katzengras->setIcon("images/plants/Aloe.png");
        $katzengras->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($katzengras);
        $manager->flush();
        $this->addReference(self::KATZENGRAS, $katzengras);


        /*---------------------------------VENUSFLIEGENFALLE--------------------------------*/

        $venusfliegenfalle = new Plant();

        $venusfliegenfalle->setLinkName("venusfliegenfalle");
        
        $venusfliegenfalle->setName("Venusfliegenfalle");
        $venusfliegenfalle->setLatinName("Dionea Muscipula");
        $venusfliegenfalle->setGenus("Fleischfressende Pflanzen");
        $venusfliegenfalle->setCareLevel("gering");
        $venusfliegenfalle->setWateringAmount("alle 2 Tage");
        $venusfliegenfalle->setLocationIcon("sehr hell, sonnig");
        $venusfliegenfalle->setTemperatureIcon("20-23°C");
        $venusfliegenfalle->setFertiliserIcon("kein Dünger");
        $venusfliegenfalle->setSubstrateIcon("ungedüngter Torf, keine Blumenerde");
        $venusfliegenfalle->setHeydayIcon("Frühjahr");
        $venusfliegenfalle->setHeightIcon("10–50 cm");
        $venusfliegenfalle->setShortDescription("Die bekannteste unter den Fleischfressenden Pflanzen ist wohl die Venusfliegenfalle. Diesen Namen trägt sie nicht umsonst, denn ihre Blätter hat die Pflanze zu einer Klappfalle gebildet. Auf deren Innenseite befinden sich kleine Kontakthärchen, die Nektar produzieren und somit die Beute anlockt.");
        $venusfliegenfalle->setLocationAddinfo("Im Sommer kann die Pflanze auch nach draußen umziehen.");
        $venusfliegenfalle->setTemperatureAddinfo("Überwinterung: etwas kühlere Temperatur als normal");
        $venusfliegenfalle->setCareTips("Pflegetipps???");

        $venusfliegenfalle->setIcon("images/plants/Aloe.png");
        $venusfliegenfalle->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($venusfliegenfalle);
        $manager->flush();
        $this->addReference(self::VENUSFLIEGENFALLE, $venusfliegenfalle);


        /*---------------------------------NARZISSE--------------------------------*/

        $narzisse = new Plant();

        $narzisse->setLinkName("narzisse");
        
        $narzisse->setName("Narzisse");
        $narzisse->setAlternativeName("Osterglocke, Märzenbecher, Osterglöckchen");
        $narzisse->setLatinName("Narcissus");
        $narzisse->setGenus("Amaryllisgewächse");
        $narzisse->setCareLevel("mittel");
        $narzisse->setWateringAmount("alle 2-3 Tage");
        $narzisse->setLocationIcon("sonnig");
        $narzisse->setTemperatureIcon("10-17°C");
        $narzisse->setFertiliserIcon("April-Semptember: 1x moantlich");
        $narzisse->setSubstrateIcon("Blumen- oder Kakteenerde");
        $narzisse->setHeydayIcon("Frühjahr");
        $narzisse->setHeightIcon("50 cm");
        $narzisse->setShortDescription("Die Narzisse ist drinnen und draußen eine beliebtePflanzen. Als Zimmerpflanze wurde 2016 zur beliebtesten Pflanze gekührt und ist einfach zu Pflegen. Ihre schöne Glockenform ziert den Innenraum.
Zu beachten ist das richtige Überwintern und das Stutzen der Stängel nach der Blütezeit. So kann sich der Besitzer auch in den Folgejahren an der Narzisse erfreuen.");
        $narzisse->setLocationAddinfo(
            "- sonnig und hell
            - gerne mit Mittagssonne 
            Achtung 
            - zu dunkler Standort kann zu langen, dünnen und herabhängenden Blättern führen");
        $narzisse->setTemperatureAddinfo(
            "Überwinterung: je kälter die Pflanzen plaziert sind, desto länger halten ihre Blüten");
        $narzisse->setPot("Am Besten eine größe Größer als die Narzissen Platz brauchen, damit sich die Zwiebeln noch etwas ausbreiten können");
        $narzisse->setWateringAmountAddinfo("- Erde soll gleichmäßig feucht gehalten weden (nicht Topfnass)
        - Häufigkeit des Gießens ist abhängig von der Temperatur > je kühler, desto weniger Wasser
        - oberflächliches Antrocknen zwischen den Wassertrocknen wird vertragen
        Achtung
        - ganz austrocknen oder unter Wasser stehen tötet die Pflanze");
        $narzisse->setFertiliserAddinfo("- halbkonzentriert, grünpflanzendünger von April bis Semptember (monatlich)
        - Düngen durch Stäbchendünger oder zuführen von Dünger im Gießwasser (halbkonzentrierter Grün- oder Blühpflanzendünger)
        - neu gekaufte oder frisch umgetopfte Narzissen müssen, wenn in der Erde Dünger enthalten ist, acht Wochen nicht gedüngt werden");
        $narzisse->setFlowerColor("Gelb, Weiß, Weiß-Gelb, Gelb-Orange");
        $narzisse->setCareTips("Beim Abblühen das Zurückschneiden der grünen Stängel vermeiden, da die Narzisse durch diese Nährstoffe in den Zwiebeln einlagern sobald die Blätter abblühen anfangen (gelb werden) düngen einstellen und Wassergabe reduzieren > es bilden sich Tochterzwiebeln. 
        Wenn die Blütenknospen zu sehen sind, ist es ratsam, die Narzisse an einen kühleren Ort wie in den Hausflur zu stellen. Dort halten sich die Blüten länger. 
Wichtig ist die Stängel nach der Blütenzeit zu stutzen, aber die Blätter noch an der Nazisse zu lassen, sodass die Zwiebeln genug Nährstoffe erhalten und überleben");

        $narzisse->setIcon("images/plants/Aloe.png");
        $narzisse->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($narzisse);
        $manager->flush();
        $this->addReference(self::NARZISSE, $narzisse);


        /*---------------------------------ORCHIDEE--------------------------------*/

        $orchidee = new Plant();

        $orchidee->setLinkName("orchidee");
        
        $orchidee->setName("Orchidee");
        $orchidee->setLatinName("Orchidacea");
        $orchidee->setGenus("Bedecktsamer");
        $orchidee->setCareLevel("hoch");
        $orchidee->setWateringAmount("alle 2 - 3 Tage");
        $orchidee->setLocationIcon("sonnig, keine direkte Sonneneinstrahlung");
        $orchidee->setTemperatureIcon("13-30°C");
        $orchidee->setFertiliserIcon("Frühling/Sommer: alle 2 Wochen");
        $orchidee->setSubstrateIcon("Blumenerde/Orchideenerde");
        $orchidee->setHeydayIcon("zwischen Februar und Mai");
        $orchidee->setHeightIcon("20 cm");
        $orchidee->setSpecialFeatureIcon("1x im Jahr");
        $orchidee->setShortDescription("Aufgrund ihrer hübschen Blüten zählen Orchideen zu den meistverbreiteten Zimmerpflanzen. Doch um kräftig und lange zu blühen, die tropischen Gewächse besonders viel Pflege.");
        $orchidee->setSpecialFeaturesAddinfo("Sie besitzt wunderschöne, verschiedenfärbige und manchmal auch gesprenkelte Blüten, welche in jedem Wohnraum sehr gut zur Geltung kommen. Ihre Wurzeln sind großteils Obererdig. Es ist wichtig die Orchidee gut zu Pflegen, da sie sehr empfindlich sind. Mit der richtigen Pflege kann eine Orchidee jedoch über das ganze Jahr hinweg blühen.");
        $orchidee->setLocationAddinfo("Stellen Sie die Orchidee an einen sonnigen Standort ohne direkte Sonneneinstrahlung. Zu viel Sonnenlicht schadet den Blättern und sorgt dafür, dass diese weniger glänzen. Diese Zimmerpflanze mag keinen Luftzug. Auch ist es ratsam, die Orchidee nicht in die Nähe einer Heizung zu stellen bei. 
Bitte beachten Sie, dass Sie die Zimmerpflanze nicht in die Nähe einer Obstschale stellen. Obst sondert ein spezielles Gas aus, wodurch die Pflanze schneller altert.");
        $orchidee->setPot("Topfen Sie die Orchidee alle 2 bis 3 Jahre oder aber wenn der Topf zu klein geworden ist um. Verwenden Sie beim Umtopfen spezielle Orchideenerde. Entfernen Sie schlechte Wurzeln, bevor Sie die Pflanze in den neuen Topf setzen. Sie können die Pflanze auch direkt nach der Anschaffung umtopfen. Benutzen Sie in beiden Fällen einen Topf der mindestens 20% größer ist als der vorherige. Topfen Sie die Pflanze bevorzugt im Frühling um. In dieser Zeit kann die Orchidee eventuelle Beschädigungen besser heilen.");
        $orchidee->setWateringAmountAddinfo("Die Orchidee braucht nicht viel Wasser. Die Pflanze verlangt erst Wasser, wenn der Boden relativ trocken ist. Gießen Sie die Zimmerpflanze deswegen alle 7 bis 10 Tage mit einer kleinen Menge. Gießen Sie das Wasser auf die Erde und nicht auf die Pflanze selbst. Sorgen Sie dafür, dass das Wasser Zimmertemperatur hat. Gießen Sie bevorzugt am Morgen. Auf diese Weise kann die Orchidee das Wasser besser aufnehmen. 
Vermeiden Sie, dass Wasser länger im Topf zum Stehen kommt. Im Winter ist diese Zimmerpflanze im Ruhezustand. Geben Sie daher in dieser Zeit weniger Wasser. 
Tipp: Sprühen im Winter Die Orchidee stellt keine hohen Ansprüche an Luftfeuchtigkeit. Im Winter ist es ratsam, die Pflanze ab und zu zu besprühen. Damit erhöhen Sie die Luftfeuchtigkeit. 
Tipp: Wasserbad für die Luftwurzeln In ihrer Heimat gedeiht die Phalaenopsis-Orchidee als Aufsitzerpflanze. Ihre Luftwurzeln entnehmen dabei den kurzen, aber heftigen Regenschauern die lebenswichtige Feuchtigkeit.");
        $orchidee->setFertiliserAddinfo("Sie können der Orchidee im Frühling und Sommer extra Dünger geben. Verwenden Sie hierfür speziele Orchidee-Dünger. Düngen Sie die Orchidee im Herbst und Winter nicht extra. Dies schadet der Pflanze. Für die richtige Menge schauen Sie auf die Verpackung. Nutzen Sie nie mehr als angegeben.");
        $orchidee->setFlowerColor("Lila, Rosa, Pink, Weiß, Blau, Orange, Gelb, Grün, Purpur, Lavendel, Rot, ..., Gesprenkel, Mischformen");
        $orchidee->setHeydayAddinfo("Die Mehrzahl der Orchideensorten blühen maximal einmal pro Jahr. Die Blüte dauert ungefähr 6 bis 10 Wochen. Eine Ausnahme ist hier die Phalaenopsis Orchidee. Diese Variante kann bis zu dreimal im Jahr blühen mit einer Blütenzeit von zwei bis 6 Monaten. Aus diesem Grund ist die Phalaenopsis Orchidee sehr beliebt in den Niederlanden. Stellen Sie die Orchidee nach der Blüte an einen kälteren Platz. Tun Sie dies für ungefähr 3 bis 4 Wochen. Auf diese Weise kann die Pflanze leichter neue Äste produzieren.");
        $orchidee->setCareTips("Verfärbte Blätter: 
        Wenn die Pflanze ihre Knospen fallen lässt, ist das die Folge von zu viel Kälte, zu viel Wasser oder zu wenig Licht. Unter 15 Grad sind die Wurzeln nicht mehr aktiv, weshalb die Pflanze ihre Knospen verliert. Zu viel Sonnenlicht verbrennt die Blätter und der Glanz geht verloren. Dunkel grüne Blätter sind ein Zeichen dafür, dass die Orchidee mehr Licht braucht.
        Schneiden:
    Die Orchidee blüht von ende Winter bis Februar/März. Entfernen Sie die verblühten Blüten. Schneiden Sie alle tote Blätter und alte Stängel ab. Schneiden Sie den Stängel bis 12 Millimeter unter der verblühten Blüte ab. 
Es ist ratsam, eine Gartenschere zu verwenden. Die Orchidee ist nämlich sehr empfindlich. In dem Sie eine Gartenschere verwenden, entsteht eine schönere Wunde die besser heilen kann.
    Schädlinge:
    Orchideen sind anfällig für Schildläuse. Vorsorgliches Sprühen wirkt gut gegen Schildläuse. Diese mögen nämlich keine Feuchtigkeit. Bekämpfen ist auch möglich. Hierfür gibt es spezielle Schädlingsbekämpfungsmitteln.");

        $orchidee->setIcon("images/plants/Aloe.png");
        $orchidee->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($orchidee);
        $manager->flush();
        $this->addReference(self::ORCHIDEE, $orchidee);


        /*---------------------------------WEIHNACHTSSTERN--------------------------------*/

        $weihnachtsstern = new Plant();

        $weihnachtsstern->setLinkName("weihnachtsstern");

        $weihnachtsstern->setName("Weihnachsstern");
        $weihnachtsstern->setAlternativeName("Adventtstern, Chrisststern");
        $weihnachtsstern->setLatinName("Euphorbia pulcherrima");
        $weihnachtsstern->setGenus("Wolfsmilchgewächse");
        $weihnachtsstern->setCareLevel("hoch");
        $weihnachtsstern->setWateringAmount("alle 1-2 Tage");
        $weihnachtsstern->setLocationIcon("keine direkte Sonne");
        $weihnachtsstern->setTemperatureIcon("15-22°C");
        $weihnachtsstern->setFertiliserIcon("1x im Monat");
        $weihnachtsstern->setSubstrateIcon("Kakteenerde");
        $weihnachtsstern->setHeydayIcon("Weinachten");
        $weihnachtsstern->setHeightIcon("15-20 cm");
        $weihnachtsstern->setSpecialFeatureIcon("giftig");
        $weihnachtsstern->setShortDescription("Der Weihnachtsstern ist eine beliebte Zimmerpflanze in der Adventszeit - aber er ist auch sehr anspruchsvoll. ");
        $weihnachtsstern->setLocationAddinfo("Der Weihnachtsstern bevorzugt einen hellen Standort ohne direkte Sonne und Temperaturen von 15 bis 22 Grad. Wenn ein Weihnachtsstern seine Blätter verliert, sind oft Kälte und Zugluft schuld, denn beides verträgt die ursprünglich in Mexiko beheimatete Pflanze nicht.");
        $weihnachtsstern->setPot("Da die Erde des Topfballens bei neu gekauften Weihnachtssternen oft minderwertig ist und das Wasser nicht richtig hält, empfiehlt sich spätestens nach der Blüte ein Umtopfen. Als gutes Substrat hat sich Kakteenerde erwiesen, da sie wenig Feuchtigkeit speichert und die staunässeempfindlichen Wurzeln des Weihnachtssterns zu häufiges Gießen so besser vertragen, als wenn sehr humusreiche Erde zum Einsatz kommt.");
        $weihnachtsstern->setWateringAmountAddinfo("Weihnachtssterne gedeihen, wenn sie regelmäßig handwarmes Wasser bekommen. Auf einen ausgetrockneten Wurzelballen reagiert die Pflanze mit dem Abwerfen ihrer Blätter. Sie erholt sie sich aber meist wieder, nachdem sie gegossen wurde. Zu große Feuchtigkeit oder Staunässe hingegen verzeiht der Weihnachtsstern kaum: Seine Blätter färben sich gelb und fallen ab, die Wurzeln fangen an zu faulen- im schlimmsten Fall geht er ein. Vor dem Kauf sollte geprüft werden, wie feucht der Wurzelballen ist.");
        $weihnachtsstern->setFertiliserAddinfo("Während der Blüte brauchen Weihnachtssterne keinen Dünger. Danach genügt es, dem Wasser einmal im Monat eine Nährstofflösung zuzugeben.");
        $weihnachtsstern->setFlowerColor("Blüten: Rot, Rosa, Weiß, Orange-Rot
        Blätter: Grün");
        $weihnachtsstern->setHeydayAddinfo("Damit ein Weihnachtsstern pünktlich zum Fest farbige Blätter entwickelt, muss er zuvor mindestens acht Wochen lang mindestens 12 Stunden täglich in völliger Dunkelheit stehen. Bereits kleinste Lichtmengen während der täglichen Verdunkelungszeit verhindern erneutes Blühen. Deshalb lohnt es sich meist eher, jedes Jahr eine neue Pflanze zu kaufen.");
        $weihnachtsstern->setCareTips("Der Weihnachtsstern wird nach Weihnachten, wenn er seine roten Hochblätter verliert, oft einfach entsorgt – zu Unrecht, denn wer ein paar Pflege-Tipps beachtet, hat lange etwas von ihm. Der 
Weihnachtsstern eine Kurztagspflanze. Er bildet nur bei weniger als zwölf Stunden Tageslänge neue Hochblätter und Blütenknospen aus. In unseren Breiten ist das ab Oktober der Fall. Allerdings dauert die Helligkeit im Wohnraum durch künstliches Licht meist deutlich länger an, als sie der Weihnachtsstern zur Blütenbildung benötigt. Wird er länger als zwölf Stunden Licht ausgesetzt, tritt er in den Blühstreik und bildet nur grüne Blätter: Der Langschläfer braucht eben seinen Schönheitsschlaf. 
Die Eigenschaft, dass die Blütenbildung beim Weihnachtsstern durch eine maximal zwölf Stunden lange Belichtung ausgelöst wird, machen sich hierzulande die Gärtnereien zunutze: Sie decken ihre Gewächshäuser ab Oktober mit schwarzer Folie ab, sodass den Weihnachtssternen ein entsprechend kurzer Tag vorgegaukelt wird. Und voilá – zusammen mit der Blüte erscheinen die roten Sterne pünktlich zur Adventszeit. Im Umkehrschluss bedeutet das, dass Sie Ihren Weihnachtsstern auch mitten im Sommer blühen lassen können, wenn Sie etwas experimentieren und den Lichtentzug entsprechend früh vornehmen. ");

        $weihnachtsstern->setIcon("images/plants/Aloe.png");
        $weihnachtsstern->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($weihnachtsstern);
        $manager->flush();
        $this->addReference(self::WEIHNACHTSSTERN, $weihnachtsstern);


        /*---------------------------------YUCCA-PALME--------------------------------*/

        $yuccapalme = new Plant();

        $yuccapalme->setLinkName("yuccaPalme");

        $yuccapalme->setName("Yucca-Palme");
        $yuccapalme->setAlternativeName("Palmlilien");
        $yuccapalme->setLatinName("Yucca");
        $yuccapalme->setGenus("Palmlilien");
        $yuccapalme->setCareLevel("gering");
        $yuccapalme->setWateringAmount("1x pro Woche");
        $yuccapalme->setLocationIcon("hell und viel Sonne");
        $yuccapalme->setTemperatureIcon("10-24°C");
        $yuccapalme->setFertiliserIcon("April-Oktober: etwa alle 2 Wochen");
        $yuccapalme->setSubstrateIcon("Grünpflanzenerde + Sand");
        $yuccapalme->setHeydayIcon("Keine Blüten");
        $yuccapalme->setHeightIcon("500 cm");
        $yuccapalme->setShortDescription("Es gibt kaum einen Haushalt, in dem nicht mindestens eine Yucca-Palme vorhanden ist: Yuccas mit ihren über 30 verschiedenen Arten zählen hierzulande zu den beliebtesten Palmen und sind – da sie auch relativ pflegeleicht sind – überall gerne gesehen. ");
        $yuccapalme->setSpecialFeaturesAddinfo("Aufgrund ihrer sehr dekorativen Form und der Anordnung ihrer Blätter wird sie auch „Palmlilie“ genannt. In ihrer Heimat Süd-Amerika gilt sie als „Baum des Lebens“. Hierzulande wird sie häufig als „Yucca-Palme“ bezeichnet, was allerdings nicht korrekt ist");
        $yuccapalme->setLocationAddinfo("Yucca-Palmen brauchen einen hellen Standort. Die Pflanzen richten sich immer nach der Sonne aus, weshalb zu dunkel stehende Exemplare nicht aufrecht nach oben, sondern schief wachsen und zudem vergeilen. Sie können die Pflanzen auch in die direkte Sonne stellen, allerdings müssen Sie sie zunächst einmal langsam daran gewöhnen – anderenfalls gibt es unschöne Verbrennungen auf den Blättern. Die heiße und intensive Mittagssonne insbesondere während der Sommermonate sollte jedoch gemieden werden.");
        $yuccapalme->setTemperatureAddinfo("Yucca-Palmen sind nicht frosthart, überwintern aber am besten hell und kühl bei etwa 10 °C. Sie können die Pflanzen natürlich auch im warmen Wohnzimmer stehen lassen, sollten dann aber für ausreichend Licht sorgen.");
        $yuccapalme->setPot("Am besten topfen Sie eine frisch gekaufte Yucca-Palme gleich um, denn die mit verkauften Pflanztöpfe sind in aller Regel viel zu klein. Die Pflanze entwickelt recht starke Wurzeln, weshalb der Topf eher hoch als breit ausfallen sollte. Wählen Sie jedoch auch kein allzu schmales Gefäß, da dieses aufgrund des Eigengewichts der Pflanze schnell umkippen kann.");
        $yuccapalme->setWateringAmountAddinfo("Yucca-Palmen werden in der Regel eher zu viel als zu wenig gegossen. Halten Sie das Substrat stets leicht feucht und machen Sie vor jedem Wässern zunächst eine Fingerprobe: Die Erde sollte sich bis in eine Tiefe von etwa zwei Zentimetern trocken anfühlen. Gießen Sie nicht durchdringend, sondern nur wenig. Überschüssiges Gießwasser sollte aus dem Untersetzer umgehend entfernt werden, um Staunässe zu vermeiden.");
        $yuccapalme->setFertiliserAddinfo("Düngen Sie die Yucca-Palme während der Wachstumssaison zwischen April und Oktober etwa alle zwei Wochen mit einem ausgewogenen Dünger für Grünpflanzen. Am besten eignet sich ein flüssiger Dünger, der zusammen mit dem Gießwasser verabreicht wird. Wer das Düngen häufiger vergisst, kann auch Langzeitdünger verwenden.");
        $yuccapalme->setCareTips("Yuccas benötigen neben Licht unbedingt eine hohe Luftfeuchtigkeit, um sich wohl zu fühlen. Ist diese nicht gegeben, müssen die Palmen regelmäßig besprüht werden. 
Des Weiteren haben Yuccas einen hohen Wasserbedarf und müssen dementsprechend oft gegossen werden. Staunässe ist unbedingt zu vermeiden.
Eine monatliche Düngegabe von März bis September genügt den Yucca-Palmen vollkommen. 
Yuccas sollten alle 2 – 3 Jahre umgetopft werden, nämlich immer dann, wenn der Ballen komplett durchwurzelt ist. Bei der Wahl des Pflanzgefäßes ist darauf zu achten, dass dieses tief und nicht breit ist.");

        $yuccapalme->setIcon("images/plants/Aloe.png");
        $yuccapalme->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($yuccapalme);
        $manager->flush();
        $this->addReference(self::YUCCAPALME, $yuccapalme);


        /*---------------------------------Schwertfarn--------------------------------*/

        $schwertfarn = new Plant();

        $schwertfarn->setLinkName("schwertfarn");

        $schwertfarn->setName("Schwertfarn");
        $schwertfarn->setLatinName("Nephrolepis exaltata");
        $schwertfarn->setGenus("Schwertfarne");
        $schwertfarn->setCareLevel("gering");
        $schwertfarn->setWateringAmount("1-2 Mal pro Woche");
        $schwertfarn->setLocationIcon("hell, aber kein direktes Sonnenlicht");
        $schwertfarn->setTemperatureIcon("18°C");
        $schwertfarn->setFertiliserIcon("alle 2 Wochen");
        $schwertfarn->setSubstrateIcon("Substrat auf Torfbasis, Blumenerde");
        $schwertfarn->setHeightIcon("108 cm");
        $schwertfarn->setShortDescription("Der Schwertfarn kommt ursprünglich aus tropischen Wäldern, wo er meist als Aufsitzerpflanze auf anderen Pflanzen wächst. Er ist ein guter Schadstofffilter und trägt zur Verbesserung des Raumklimas bei.");
        $schwertfarn->setSpecialFeaturesAddinfo("Dank seines dichten, überhängenden Wuchses, eignet er sich perfekt zur Pflege in einer Blumenampel.");
        $schwertfarn->setLocationAddinfo("Der Schwertfarn benötigt einen hellen Standort, jedoch ohne direkter Sonneneinstrahlung. Da er viel Luftfeuchtigkeit benötigt, eignet sich ein helles Badezimmer besonders gut als Standort. Wegen seiner überhängenden Wedeln eignet er sich gut als Ampelpflanze");
        $schwertfarn->setPot("Wenn der Topf vollständig durchwurzelt ist, soll er im Frühjahr in einen größeren Topf umgetopft werden. Wenn man keinen größeren Topf verwenden will, kann man die Wurzeln seitlich vorsichtig schneiden. Den freigewordenen Platz füllt man mit Blumenerde auf");
        $schwertfarn->setWateringAmountAddinfo("Die Erde sollte gleichmäßig feucht bleiben, man sollte oft gießen, jedoch nicht zu reichlich, vor allem bei Temperaturen unter 16 °C. Unbedingt Staunässe und zu lange Trockenheit vermeiden");
        $schwertfarn->setFertiliserAddinfo("Alle zwei Wochen mit flüssigen Volldünger. Bei Komposterdenbasis nur alle 4 Wochen.");
        $schwertfarn->setCareTips("Während der Wachstumszeit öfter düngen, im Winter eher seltener. Der beste Zeitraum zum Umtopfen ist der Frühling. Bei Lufttrockenheit kann es sein, dass der Schwertfarn von Spinnmilben befallen wird und seine Blätter abwirft, deshalb sollte er öfter abgesprüht werden oder in einem Raum mit hoher Luftfeuchtigkeit platziert werden.");

        $schwertfarn->setIcon("images/plants/Aloe.png");
        $schwertfarn->setWindowIcon("images/plants/AloeBackground.png");

        $manager->persist($schwertfarn);
        $manager->flush();
        $this->addReference(self::SCHWERTFARN, $schwertfarn);

    }

    public function getOrder()
    {
        return 100;
    }
}


