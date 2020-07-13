<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\FriendRequest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Date;

class UserFixtures extends Fixture
{
    public const TESTUSER = 'admin-user';

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
        $user->setDescription('Hi guys. I\'m Mira and I\'m happy to use this app to take better care of my userPlants.');
        $user->setCountry("Österreich");
        $user->setLevel(1559);
        $user->setUserPic("/images/pictures/profile_test1.jpg");

        $dateAdded = date_create('2019-05-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');
        $user->setCreated($dateAdded);

        $dateBirth = date_create('2000-02-03 12:30:03');
        $dateBirth->format('Y-m-d h.i.s');
        $user->setDateBirth($dateBirth);
        $user->setXP(0);

        $user->setPassword($this->passwordEncoder->encodePassword($user, "test123"));

        $user->setCounterPlantsAdded(3);
        $user->setCounterFriends(1);

        $roles[] = 'ROLE_USER';
        $user->setRoles($roles);

        //$this.addReference('user.member', $user);

        $user->setFriends(["Milan", "Markus", "Kita", "Marie"]);
        //$user->setGarden(["plant1", "plant2", "plant3", "plant4"]);

        $manager->persist($user);

        $this->addReference(self::TESTUSER, $user);


        $user2 = new User();

        //Set the parameters
        $user2->setEmail("test2@test.at");

        $user2->setUsername("Testuser2");
        $user2->setFirstName("Franzi");
        $user2->setLastName("Fuchs");
        $user2->setDescription('Hallo! Wie gehts?');
        $user2->setCountry("Österreich");
        $user2->setLevel(1559);
        $user2->setUserPic("/images/pictures/profile_test1.jpg");

        $dateAdded = date_create('2019-05-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');
        $user2->setCreated($dateAdded);

        $dateBirth = date_create('2000-02-03 12:30:03');
        $dateBirth->format('Y-m-d h.i.s');
        $user2->setDateBirth($dateBirth);
        $user2->setXP(0);

        $user2->setPassword($this->passwordEncoder->encodePassword($user2, "test123"));

        $roles[] = 'ROLE_USER';
        $user2->setRoles($roles);

        $user2->setFriends(["Milan", "Markus", "Kita", "Marie"]);

        $friendRequest = new FriendRequest();
        $friendRequest->setReceiver($user);
        $friendRequest->setConfirmed(false);
        $friendRequest->setDate(date_create('2000-02-03 12:30:03'));

        $manager->persist($friendRequest);

        $user2->addOutgoingFriendRequest($friendRequest);

        $manager->persist($user2);


        $user3 = new User();

        //Set the parameters
        $user3->setEmail("test3@test.at");

        $user3->setUsername("Testuser3");
        $user3->setFirstName("Maria");
        $user3->setLastName("Dachsinger");
        $user3->setDescription('Ich heiße Maria..');
        $user3->setCountry("Deutschland");
        $user3->setLevel(1559);
        $user3->setUserPic("/images/pictures/maria.jpg");

        $dateAdded = date_create('2019-07-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');
        $user3->setCreated($dateAdded);

        $dateBirth = date_create('1997-02-03 12:30:03');
        $dateBirth->format('Y-m-d h.i.s');
        $user3->setDateBirth($dateBirth);
        $user3->setXP(0);

        $user3->setPassword($this->passwordEncoder->encodePassword($user3, "test123"));

        $roles[] = 'ROLE_USER';
        $user3->setRoles($roles);

        $user3->setFriends(["Milan", "Markus", "Kita", "Marie"]);

        $friendRequest = new FriendRequest();
        $friendRequest->setReceiver($user);
        $friendRequest->setConfirmed(true);
        $friendRequest->setDate(date_create('2019-02-03 12:30:03'));

        $manager->persist($friendRequest);

        $user3->addOutgoingFriendRequest($friendRequest);

        $manager->persist($user3);

        $manager->flush();

        $user4 = new User();

        //Set the parameters
        $user4->setEmail("test4@test.at");

        $user4->setUsername("AdminUser");
        $user4->setFirstName("Hugo");
        $user4->setLastName("Doe");
        $user4->setDescription('Hi guys. I\'m Mira and I\'m happy to use this app to take better care of my userPlants.');
        $user4->setCountry("Österreich");
        $user4->setLevel(1559);
        $user4->setUserPic("/images/pictures/profile_test1.jpg");

        $dateAdded = date_create('2019-05-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');
        $user4->setCreated($dateAdded);

        $dateBirth = date_create('2000-02-03 12:30:03');
        $dateBirth->format('Y-m-d h.i.s');
        $user4->setDateBirth($dateBirth);

        $user4->setPassword($this->passwordEncoder->encodePassword($user4, "test"));

        $roles[] = 'ROLE_ADMIN';
        $user4->setRoles($roles);

        //$this.addReference('user.member', $user);

        $user4->setFriends(["Milan", "Markus", "Kita", "Marie"]);
        //$user->setGarden(["plant1", "plant2", "plant3", "plant4"]);

        $manager->persist($user4);
        $manager->flush();
    }
}
