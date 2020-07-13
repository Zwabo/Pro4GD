<?php

namespace App\DataFixtures;

use App\Entity\Award;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AwardsFixtures extends Fixture implements OrderedFixtureInterface
{

    public const FRIENDSONE = 'friendsOne';
    public const FRIENDSFIVE = 'friendsFive';
    public const FRIENDSTEN = 'frinedsTen';
    public const FRIENDSTWENTY = 'friendsTwenty';
    public const FRIENDSFIFTY = 'friendsFifty';
    public const FRIENDSSEVENTY = 'friendsSeventy';
    public const FRIENDSONEHUNDRET = 'friendsOnehundret';
    public const FRIENDSONEHUNDRETFIFTY = 'friendsOnehundretfifty';
    public const FRIENDSTWOHUNDRET = 'friendsTwohundret';
    public const FRIENDSTWOHUNDRETFIFTY = 'friendsTwohundretfifty';
    public const FRIENDSTHREEHUNDRED = 'friendsThreehundret';

    public const LIVEDONEMONTH = 'livedOneMonth';
    public const LIVEDTHREEMONTHS = 'livedThreeMonths';
    public const LIVEDSIXMONTHS = 'livedSixMonths';
    public const LIVEDTWELVEMONTHS = 'livedTwleveMonths';

    public const MEMBERNEW = 'memberNew';
    public const MEMBERBRONCE = 'memberBronce';
    public const MEMBERSILVER = 'memberSilver';
    public const MEMBERGOLD = 'memberGold';

    public const USERPLANTONE = 'userplantOne';
    public const USERPLANTFIVE = 'userplantFive';
    public const USERPLANTTEN = 'userplantTen';
    public const USERPLANTTWENTY = 'userplantTwenty';
    public const USERPLANTFIFTY = 'userplantFifty';
    public const USERPLANTSEVENTY = 'userplantSeventy';
    public const USERPLANTONEHUNDRET = 'userplantOnehundret';
    public const USERPLANTONEHUNDRETFIFTY = 'userplantOnehundretfifty';
    public const USERPLANTTWOHUNDRET = 'userplantTwohundret';
    public const USERPLANTTWOHUNDRETFIFTY = 'userplantTwohundretfifty';
    public const USERPLANTTHREEHUNDRET = 'userplantThreehundret';
    public const USERPLANTTHREEHUNDRETFIFTY = 'userplantThreehundretfifty';
    public const USERPLANTFOURHUNDRET = 'userplantFourhundret';
    public const USERPLANTFIVEHUNDRET = 'userplantFivehundret';

    public const WATEREDONE = 'wateredOne';
    public const WATEREDFIVE = 'wateredFive';
    public const WATEREDTEN = 'wateredTen';
    public const WATEREDTWENTY = 'wateredTwenty';
    public const WATEREDFIFTY = 'wateredFifty';
    public const WATEREDSEVENTY = 'wateredSeventy';
    public const WATEREDONEHUNDRET = 'wateredOnehundret';
    public const WATEREDONEHUNDRETFIFTY = 'wateredOnehundretfifty';
    public const WATEREDTWOHUNDRET = 'wateredTwohundret';
    public const WATEREDTWOHUNDRETFIFTY = 'wateredTwohundretfifty';
    public const WATEREDTHREEHUNDRET = 'wateredThreehundret';
    public const WATEREDTHREEHUNDRETFIFTY = 'wateredThreehundretfifty';
    public const WATEREDFOURHUNDRET = 'wateredFourhundret';
    public const WATEREDFIVEHUNDRET = 'wateredFivehundret';

    public const LVLSPROESSLING = 'lvlSproessling';
    public const LVLHOBBYGAERTNER = 'lvlHobbygaertner';
    public const LVLPFLANZENFLUESTERER = 'lvlPflanzenfluesterer';
    public const LVLGOLDENERDAUMEN = 'lvlGoldenerDaumen';

    public function load(ObjectManager $manager)
    {
        /*---------------------------------friends badges--------------------------------*/
        $friendsOne = new Award();
        $friendsOne->setName("friendsOne");
        $friendsOne->setAwardIcon("images/badges/friends1.svg");
        $friendsOne->setAltText(" hat die erste Freundschaft geschlossen.");
        $manager->persist($friendsOne);
        $manager->flush();
        $this->addReference(self::FRIENDSONE, $friendsOne);

        $friendsFive = new Award();
        $friendsFive->setName("freindsFive");
        $friendsFive->setAwardIcon("images/badges/friends5.svg");
        $friendsFive->setAltText(" hat fünf Freundschaften geschlossen.");
        $manager->persist($friendsFive);
        $manager->flush();
        $this->addReference(self::FRIENDSFIVE, $friendsFive);

        $friendsTen = new Award();
        $friendsTen->setName("friendsTen");
        $friendsTen->setAwardIcon("images/badges/friends10.svg");
        $friendsTen->setAltText(" hat zehn Freundschaften geschossen.");
        $manager->persist($friendsTen);
        $manager->flush();
        $this->addReference(self::FRIENDSTEN, $friendsTen);

        $friendsTwenty = new Award();
        $friendsTwenty->setName("friendsTwenty");
        $friendsTwenty->setAwardIcon("images/badges/friends20.svg");
        $friendsTwenty->setAltText(" hat zwanzig Freundschaften geschossen.");
        $manager->persist($friendsTwenty);
        $manager->flush();
        $this->addReference(self::FRIENDSTWENTY, $friendsTwenty);

        $firendsFifty = new Award();
        $firendsFifty->setName("friendsFifty");
        $firendsFifty->setAwardIcon("images/badges/friends50.svg");
        $firendsFifty->setAltText(" hat 50 Freundschaften geschossen.");
        $manager->persist($firendsFifty);
        $manager->flush();
        $this->addReference(self::FRIENDSFIFTY, $firendsFifty);

        $friendsSeventy = new Award();
        $friendsSeventy->setName("friendsSeventy");
        $friendsSeventy->setAwardIcon("images/badges/friends70.svg");
        $friendsSeventy->setAltText(" hat 70 Freundschaften geschossen.");
        $manager->persist($friendsSeventy);
        $manager->flush();
        $this->addReference(self::FRIENDSSEVENTY, $friendsSeventy);

        $friendsOnehundret = new Award();
        $friendsOnehundret->setName("friendsOnehundret");
        $friendsOnehundret->setAwardIcon("images/badges/friends100.svg");
        $friendsOnehundret->setAltText(" hat 100 Freundschaften geschossen.");
        $manager->persist($friendsOnehundret);
        $manager->flush();
        $this->addReference(self::FRIENDSONEHUNDRET, $friendsOnehundret);

        $friendsOnehundretfifty = new Award();
        $friendsOnehundretfifty->setName("friendsOnehundretfifty");
        $friendsOnehundretfifty->setAwardIcon("images/badges/friends150.svg");
        $friendsOnehundretfifty->setAltText(" hat 150 Freundschaften geschossen.");
        $manager->persist($friendsOnehundretfifty);
        $manager->flush();
        $this->addReference(self::FRIENDSONEHUNDRETFIFTY, $friendsOnehundretfifty);

        $friendsTwohundret = new Award();
        $friendsTwohundret->setName("friendsTwohundret");
        $friendsTwohundret->setAwardIcon("images/badges/friends200.svg");
        $friendsTwohundret->setAltText(" hat 200 Freundschaften geschossen.");
        $manager->persist($friendsTwohundret);
        $manager->flush();
        $this->addReference(self::FRIENDSTWOHUNDRET, $friendsTwohundret);

        $friendsTwohundretfifty = new Award();
        $friendsTwohundretfifty->setName("friendsTwohundretfifty");
        $friendsTwohundretfifty->setAwardIcon("images/badges/friends250.svg");
        $friendsTwohundretfifty->setAltText(" hat 250 Freundschaften geschossen.");
        $manager->persist($friendsTwohundretfifty);
        $manager->flush();
        $this->addReference(self::FRIENDSTWOHUNDRETFIFTY, $friendsTwohundretfifty);

        $friendsThreehundret = new Award();
        $friendsThreehundret->setName("friendsThreehundret");
        $friendsThreehundret->setAwardIcon("images/badges/friends300.svg");
        $friendsThreehundret->setAltText(" hat 300 Freundschaften geschossen.");
        $manager->persist($friendsThreehundret);
        $manager->flush();
        $this->addReference(self::FRIENDSTHREEHUNDRED, $friendsThreehundret);

        /*---------------------------------userplant lived--------------------------------*/
        $livedOneMonth = new Award();
        $livedOneMonth->setName("livedOneMonth");
        $livedOneMonth->setAwardIcon("images/badges/lived1month.svg");
        $livedOneMonth->setAltText("s Pflanze hat einen Monat überlebt.");
        $manager->persist($livedOneMonth);
        $manager->flush();
        $this->addReference(self::LIVEDONEMONTH, $livedOneMonth);

        $livedThreeMonths = new Award();
        $livedThreeMonths->setName("livedThreeMonths");
        $livedThreeMonths->setAwardIcon("images/badges/lived3months.svg");
        $livedThreeMonths->setAltText("s Pflanze hat drei Monate überlebt.");
        $manager->persist($livedThreeMonths);
        $manager->flush();
        $this->addReference(self::LIVEDTHREEMONTHS, $livedThreeMonths);

        $livedSixMonths = new Award();
        $livedSixMonths->setName("livedSixMonths");
        $livedSixMonths->setAwardIcon("images/badges/lived6months.svg");
        $livedSixMonths->setAltText("s Pflanze hat sechs Monate überlebt.");
        $manager->persist($livedSixMonths);
        $manager->flush();
        $this->addReference(self::LIVEDSIXMONTHS, $livedSixMonths);

        $livedTwelveMonths = new Award();
        $livedTwelveMonths->setName("livedTwelveMonths");
        $livedTwelveMonths->setAwardIcon("images/badges/lived12months.svg");
        $livedTwelveMonths->setAltText("s Pflanze hat ein Jahr überlebt.");
        $manager->persist($livedTwelveMonths);
        $manager->flush();
        $this->addReference(self::LIVEDTWELVEMONTHS, $livedTwelveMonths);

        /*---------------------------------membership--------------------------------*/
        $memberNew = new Award();
        $memberNew->setName("memberNew");
        $memberNew->setAwardIcon("images/badges/memberNew.svg");
        $memberNew->setAltText(" wurde Mitglied.");
        $manager->persist($memberNew);
        $manager->flush();
        $this->addReference(self::MEMBERNEW, $memberNew);

        $memberBronce = new Award();
        $memberBronce->setName("memberBronce");
        $memberBronce->setAwardIcon("images/badges/memberBronce.svg");
        $memberBronce->setAltText(" ist seit drei Monaten Mitglied.");
        $manager->persist($memberBronce);
        $manager->flush();
        $this->addReference(self::MEMBERBRONCE, $memberBronce);

        $memberSilver = new Award();
        $memberSilver->setName("memberSilver");
        $memberSilver->setAwardIcon("images/badges/memberSilver.svg");
        $memberSilver->setAltText(" ist seit sechs Monaten Mitglied.");
        $manager->persist($memberSilver);
        $manager->flush();
        $this->addReference(self::MEMBERSILVER, $memberSilver);

        $memberGold = new Award();
        $memberGold->setName("memberGold");
        $memberGold->setAwardIcon("images/badges/memberGold.svg");
        $memberGold->setAltText(" ist seit einem Jahr Mitglied.");
        $manager->persist($memberGold);
        $manager->flush();
        $this->addReference(self::MEMBERGOLD, $memberGold);

        /*---------------------------------userplants--------------------------------*/
        $userplantOne = new Award();
        $userplantOne->setName("userplantOne");
        $userplantOne->setAwardIcon("images/badges/userplant1.svg");
        $userplantOne->setAltText(" hat eine Pflanze dem Usergarten hinzugefügt.");
        $manager->persist($userplantOne);
        $manager->flush();
        $this->addReference(self::USERPLANTONE, $userplantOne);

        $userplantFive = new Award();
        $userplantFive->setName("userplantFive");
        $userplantFive->setAwardIcon("images/badges/userplant5.svg");
        $userplantFive->setAltText(" hat fünf Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantFive);
        $manager->flush();
        $this->addReference(self::USERPLANTFIVE, $userplantFive);

        $userplantTen = new Award();
        $userplantTen->setName("userplantTen");
        $userplantTen->setAwardIcon("images/badges/userplant10.svg");
        $userplantTen->setAltText(" hat zehn Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantTen);
        $manager->flush();
        $this->addReference(self::USERPLANTTEN, $userplantTen);

        $userplantTwenty = new Award();
        $userplantTwenty->setName("userplantTwenty");
        $userplantTwenty->setAwardIcon("images/badges/userplant20.svg");
        $userplantTwenty->setAltText(" hat zwanzig Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantTwenty);
        $manager->flush();
        $this->addReference(self::USERPLANTTWENTY, $userplantTwenty);

        $userplantFifty = new Award();
        $userplantFifty->setName("userplantFifty");
        $userplantFifty->setAwardIcon("images/badges/userplant50.svg");
        $userplantFifty->setAltText(" hat 50 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantFifty);
        $manager->flush();
        $this->addReference(self::USERPLANTFIFTY, $userplantFifty);

        $userplantSeventy = new Award();
        $userplantSeventy->setName("userplantSeventy");
        $userplantSeventy->setAwardIcon("images/badges/userplant70.svg");
        $userplantSeventy->setAltText(" hat 70 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantSeventy);
        $manager->flush();
        $this->addReference(self::USERPLANTSEVENTY, $userplantSeventy);

        $userplantOnehundret= new Award();
        $userplantOnehundret->setName("userplantOnehundret");
        $userplantOnehundret->setAwardIcon("images/badges/userplant100.svg");
        $userplantOnehundret->setAltText(" hat 100 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantOnehundret);
        $manager->flush();
        $this->addReference(self::USERPLANTONEHUNDRET, $userplantOnehundret);

        $userplantOnehundretfifty= new Award();
        $userplantOnehundretfifty->setName("userplantOnehundretfifty");
        $userplantOnehundretfifty->setAwardIcon("images/badges/userplant150.svg");
        $userplantOnehundretfifty->setAltText(" hat 150 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantOnehundretfifty);
        $manager->flush();
        $this->addReference(self::USERPLANTONEHUNDRETFIFTY, $userplantOnehundretfifty);

        $userplantTwohundret= new Award();
        $userplantTwohundret->setName("userplantTwohundret");
        $userplantTwohundret->setAwardIcon("images/badges/userplant200.svg");
        $userplantTwohundret->setAltText(" hat 200 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantTwohundret);
        $manager->flush();
        $this->addReference(self::USERPLANTTWOHUNDRET, $userplantTwohundret);

        $userplantTwohundretfifty= new Award();
        $userplantTwohundretfifty->setName("userplantTwohundretfifty");
        $userplantTwohundretfifty->setAwardIcon("images/badges/userplant250.svg");
        $userplantTwohundretfifty->setAltText(" hat 250 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantTwohundretfifty);
        $manager->flush();
        $this->addReference(self::USERPLANTTWOHUNDRETFIFTY, $userplantTwohundretfifty);

        $userplantThreehundret= new Award();
        $userplantThreehundret->setName("userplantThreehundret");
        $userplantThreehundret->setAwardIcon("images/badges/userplant300.svg");
        $userplantThreehundret->setAltText(" hat 300 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantThreehundret);
        $manager->flush();
        $this->addReference(self::USERPLANTTHREEHUNDRET, $userplantThreehundret);

        $userplantThreehundretfifty= new Award();
        $userplantThreehundretfifty->setName("userplantThreehundretfifty");
        $userplantThreehundretfifty->setAwardIcon("images/badges/userplant350.svg");
        $userplantThreehundretfifty->setAltText(" hat 350 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantThreehundretfifty);
        $manager->flush();
        $this->addReference(self::USERPLANTTHREEHUNDRETFIFTY, $userplantThreehundretfifty);

        $userplantFourhundret= new Award();
        $userplantFourhundret->setName("userplantFourhundret");
        $userplantFourhundret->setAwardIcon("images/badges/userplant400.svg");
        $userplantFourhundret->setAltText(" hat 400 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantFourhundret);
        $manager->flush();
        $this->addReference(self::USERPLANTFOURHUNDRET, $userplantFourhundret);

        $userplantFivehundret= new Award();
        $userplantFivehundret->setName("userplantFivehundret");
        $userplantFivehundret->setAwardIcon("images/badges/userplant500.svg");
        $userplantFivehundret->setAltText(" hat 500 Pflanzen dem Usergarten hinzugefügt.");
        $manager->persist($userplantFivehundret);
        $manager->flush();
        $this->addReference(self::USERPLANTFIVEHUNDRET, $userplantFivehundret);

        /*---------------------------------watered--------------------------------*/
        $wateredOne = new Award();
        $wateredOne->setName("wateredOne");
        $wateredOne->setAwardIcon("images/badges/watered1.svg");
        $wateredOne->setAltText(" hat eine Pflanze gewässert.");
        $manager->persist($wateredOne);
        $manager->flush();
        $this->addReference(self::WATEREDONE, $wateredOne);

        $wateredFive = new Award();
        $wateredFive->setName("wateredFive");
        $wateredFive->setAwardIcon("images/badges/watered5.svg");
        $wateredFive->setAltText(" hat fünf Pflanzen gewässert.");
        $manager->persist($wateredFive);
        $manager->flush();
        $this->addReference(self::WATEREDFIVE, $wateredFive);

        $wateredTen = new Award();
        $wateredTen->setName("wateredTen");
        $wateredTen->setAwardIcon("images/badges/watered10.svg");
        $wateredTen->setAltText(" hat zehn Pflanzen gewässert.");
        $manager->persist($wateredTen);
        $manager->flush();
        $this->addReference(self::WATEREDTEN, $wateredTen);

        $wateredTwenty = new Award();
        $wateredTwenty->setName("wateredTwenty");
        $wateredTwenty->setAwardIcon("images/badges/watered20.svg");
        $wateredTwenty->setAltText(" hat zwanzig Pflanzen gewässert.");
        $manager->persist($wateredTwenty);
        $manager->flush();
        $this->addReference(self::WATEREDTWENTY, $wateredTwenty);

        $wateredFivty = new Award();
        $wateredFivty->setName("wateredFifty");
        $wateredFivty->setAwardIcon("images/badges/watered50.svg");
        $wateredFivty->setAltText(" hat 50 Pflanzen gewässert.");
        $manager->persist($wateredFivty);
        $manager->flush();
        $this->addReference(self::WATEREDFIFTY, $wateredFivty);

        $wateredSeventy = new Award();
        $wateredSeventy->setName("wateredSeventy");
        $wateredSeventy->setAwardIcon("images/badges/watered70.svg");
        $wateredSeventy->setAltText(" hat 70 Pflanzen gewässert.");
        $manager->persist($wateredSeventy);
        $manager->flush();
        $this->addReference(self::WATEREDSEVENTY, $wateredSeventy);

        $wateredOnehundret = new Award();
        $wateredOnehundret->setName("wateredOnehundret");
        $wateredOnehundret->setAwardIcon("images/badges/watered100.svg");
        $wateredOnehundret->setAltText(" hat 100 Pflanzen gewässert.");
        $manager->persist($wateredOnehundret);
        $manager->flush();
        $this->addReference(self::WATEREDONEHUNDRET, $wateredOnehundret);

        $wateredOnehundretfifty = new Award();
        $wateredOnehundretfifty->setName("wateredOnehundretfifty");
        $wateredOnehundretfifty->setAwardIcon("images/badges/watered150.svg");
        $wateredOnehundretfifty->setAltText(" hat 150 Pflanzen gewässert.");
        $manager->persist($wateredOnehundretfifty);
        $manager->flush();
        $this->addReference(self::WATEREDONEHUNDRETFIFTY, $wateredOnehundretfifty);

        $wateredTwohundret = new Award();
        $wateredTwohundret->setName("wateredTwohundret");
        $wateredTwohundret->setAwardIcon("images/badges/watered200.svg");
        $wateredTwohundret->setAltText(" hat 200 Pflanzen gewässert.");
        $manager->persist($wateredTwohundret);
        $manager->flush();
        $this->addReference(self::WATEREDTWOHUNDRET, $wateredTwohundret);

        $wateredTwohundretfifty = new Award();
        $wateredTwohundretfifty->setName("wateredTwohundretfifty");
        $wateredTwohundretfifty->setAwardIcon("images/badges/watered250.svg");
        $wateredTwohundretfifty->setAltText(" hat 250 Pflanzen gewässert.");
        $manager->persist($wateredTwohundretfifty);
        $manager->flush();
        $this->addReference(self::WATEREDTWOHUNDRETFIFTY, $wateredTwohundretfifty);

        $wateredThreehundret = new Award();
        $wateredThreehundret->setName("wateredThreehundret");
        $wateredThreehundret->setAwardIcon("images/badges/watered300.svg");
        $wateredThreehundret->setAltText(" hat 300 Pflanzen gewässert.");
        $manager->persist($wateredThreehundret);
        $manager->flush();
        $this->addReference(self::WATEREDTHREEHUNDRET, $wateredThreehundret);

        $wateredThreehundretfifty = new Award();
        $wateredThreehundretfifty->setName("wateredThreehundretfifty");
        $wateredThreehundretfifty->setAwardIcon("images/badges/watered350.svg");
        $wateredThreehundretfifty->setAltText(" hat 350 Pflanzen gewässert.");
        $manager->persist($wateredThreehundretfifty);
        $manager->flush();
        $this->addReference(self::WATEREDTHREEHUNDRETFIFTY, $wateredThreehundretfifty);

        $wateredFourhundret = new Award();
        $wateredFourhundret->setName("wateredFourhundret");
        $wateredFourhundret->setAwardIcon("images/badges/watered400.svg");
        $wateredFourhundret->setAltText(" hat 400 Pflanzen gewässert.");
        $manager->persist($wateredFourhundret);
        $manager->flush();
        $this->addReference(self::WATEREDFOURHUNDRET, $wateredFourhundret);

        $wateredFivehundret = new Award();
        $wateredFivehundret->setName("wateredFivehundret");
        $wateredFivehundret->setAwardIcon("images/badges/watered500.svg");
        $wateredFivehundret->setAltText(" hat 500 Pflanzen gewässert.");
        $manager->persist($wateredFivehundret);
        $manager->flush();
        $this->addReference(self::WATEREDFIVEHUNDRET, $wateredFivehundret);

        /*---------------------------------lvl--------------------------------*/
        $lvlSproessling = new Award();
        $lvlSproessling->setName("lvlSproessling");
        $lvlSproessling->setAwardIcon("images/badges/lvlSproessling.svg");
        $lvlSproessling->setAltText(" hat den Rang \"Sprössling\" erreicht!.");
        $manager->persist($lvlSproessling);
        $manager->flush();
        $this->addReference(self::LVLSPROESSLING, $lvlSproessling);

        $lvlHobbygaertner = new Award();
        $lvlHobbygaertner->setName("lvlHobbygaertner");
        $lvlHobbygaertner->setAwardIcon("images/badges/lvlHobbygaertner.svg");
        $lvlHobbygaertner->setAltText(" hat den Rang \"Hobbygärtner\" erreicht!.");
        $manager->persist($lvlHobbygaertner);
        $manager->flush();
        $this->addReference(self::LVLHOBBYGAERTNER, $lvlHobbygaertner);

        $lvlPflanzenfluesterer = new Award();
        $lvlPflanzenfluesterer->setName("lvlPflanzenfluesterer");
        $lvlPflanzenfluesterer->setAwardIcon("images/badges/lvlPflanzenfluesterer.svg");
        $lvlPflanzenfluesterer->setAltText(" hat den Rang \"Pflanzenflüsterer\" erreicht!.");
        $manager->persist($lvlPflanzenfluesterer);
        $manager->flush();
        $this->addReference(self::LVLPFLANZENFLUESTERER, $lvlPflanzenfluesterer);

        $lvlGoldenerDaumen = new Award();
        $lvlGoldenerDaumen->setName("lvlGoldenerDaumen");
        $lvlGoldenerDaumen->setAwardIcon("images/badges/lvlGoldenerDaumen.svg");
        $lvlGoldenerDaumen->setAltText(" hat den Rang \"Goldener Daumen\" erreicht!.");
        $manager->persist($lvlGoldenerDaumen);
        $manager->flush();
        $this->addReference(self::LVLGOLDENERDAUMEN, $lvlGoldenerDaumen);
    }



    public function getOrder()
    {
        return 100;
    }
}


