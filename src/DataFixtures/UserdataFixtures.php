<?php

namespace App\DataFixtures;

use App\Entity\Userdata;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserdataFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userdata = new Userdata();

        //$userdata->setIdUser($this->getReference('id.member'));
        $userdata->setFirstname('Miranda');
        $userdata->setLastname('Amma');
        $userdata->setUsername('Mira');
        $userdata->setDescription('Hi guys. I\'m Mira and I\'m happy to use this app to take better care of my plants.');

        $dateBirth = date_create('2000-02-03');
        $dateBirth->format('Y-m-d');
        $userdata->setDateBirth($dateBirth);
        $userdata->setCountry("Österreich");

        $userdata->setLevel(1559);

        $dateAdded = date_create('2000-02-30');
        $dateAdded->format('d/m/Y');
        $userdata->setDateRegistered($dateAdded);

        $userdata->setFriends(["Milan", "Markus", "Kita", "Marie"]);
        //$this.addReference('plant.category', $plant);

        $userdata->setGarden(["plant1", "plant2", "plant3", "plant4"]);

        $manager->persist($userdata);

        $manager->flush();
    }

    public function getOrder()
    {
        return 100;
    }
}


