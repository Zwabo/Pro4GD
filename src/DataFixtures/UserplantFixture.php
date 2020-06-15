<?php

namespace App\DataFixtures;

use App\Entity\Userplant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class UserplantFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userplant = new Userplant();

        /*$queryPlant = $manager->createQuery('select id from App\Entity\Plant');
        $plantId = $queryPlant->getResult();
        $userplant->setIdPlant($plantId);

        //$userplant->setIdPlant(1);*/

        $userplant->setName("Alois");
        $userplant->setLocation("Wohnzimmer");

        $userplant->setNotes("No notes added.");

        $dateAdded = date_create('2000-02-03');
        $dateAdded->format('Y/m/d');
        $userplant->setDateAdded($dateAdded);
        $userplant->setDateWatered($dateAdded);

        $userplant->setUser($this->getReference(UserFixtures::TESTUSER));
        $userplant->setPlant($this->getReference(PlantFixtures::ALOEVERA));

        //$userplant->setUserplantCareTips("Blabalbalba");

        //$userplant->categorySelect($this->>getReference('categorySelect.plant');


        $userplant2 = new Userplant();

        $userplant2->setName("Lisa");
        $userplant2->setLocation("Küche");

        $userplant2->setNotes("No notes added.");

        $dateAdded = date_create('2000-02-03');
        $dateAdded->format('Y/m/d');
        $userplant2->setDateAdded($dateAdded);
        $userplant2->setDateWatered($dateAdded);

        $userplant2->setUser($this->getReference(UserFixtures::TESTUSER));
        $userplant2->setPlant($this->getReference(PlantFixtures::ZIMMERCALLA));

        $userplant3 = new Userplant();

        $userplant3->setName("Ben");
        $userplant3->setLocation("Bad");

        $userplant3->setNotes("No notes added.");

        $dateAdded = date_create('2000-02-03');
        $dateAdded->format('Y/m/d');
        $userplant3->setDateAdded($dateAdded);
        $userplant3->setDateWatered($dateAdded);

        $userplant3->setUser($this->getReference(UserFixtures::TESTUSER));
        $userplant3->setPlant($this->getReference(PlantFixtures::ALPENVEILCHEN));

        $manager->persist($userplant);
        $manager->persist($userplant2);
        $manager->persist($userplant3);

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
