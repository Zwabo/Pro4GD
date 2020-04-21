<?php

namespace App\DataFixtures;

use App\Controller\GardenController;
use App\Entity\Userplant;
use App\Entity\Plant;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class UserplantFixture extends Fixture
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
        //$userplant->setUserplantCareTips("Blabalbalba");

        //$userplant->category($this->>getReference('category.plant');


        $userplant2 = new Userplant();

        $userplant2->setName("Lisa");
        $userplant2->setLocation("Küche");

        $userplant2->setNotes("No notes added.");

        $dateAdded = date_create('2000-02-03');
        $dateAdded->format('Y/m/d');
        $userplant2->setDateAdded($dateAdded);
        $userplant2->setDateWatered($dateAdded);

        $manager->persist($userplant);
        $manager->persist($userplant2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 200;
    }
}