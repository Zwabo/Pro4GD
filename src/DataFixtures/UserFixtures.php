<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();

        //Set the parameters
        $user->setEmail("test@test.at");

        $user->setUsername("Testuser1");
        $user->setFirstName("Hugo");
        $user->setLastName("Doe");
        $user->setDescription('Hi guys. I\'m Mira and I\'m happy to use this app to take better care of my plants.');
        $user->setCountry("Österreich");
        $user->setLevel(1559);

        $dateAdded = date_create('2019-05-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');
        $user->setCreated($dateAdded);

        $dateBirth = date_create('2000-02-03 12:30:03');
        $dateBirth->format('Y-m-d h.i.s');
        $user->setDateBirth($dateBirth);

        $user->setPassword($this->passwordEncoder->encodePassword($user, "test123"));

        $roles[] = 'ROLE_USER';
        $user->setRoles($roles);

        //$this.addReference('user.member', $user);

        $user->setFriends(["Milan", "Markus", "Kita", "Marie"]);
        $user->setGarden(["plant1", "plant2", "plant3", "plant4"]);

        $manager->persist($user);

        $manager->flush();
    }
}
