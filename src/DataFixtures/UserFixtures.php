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
        $user->setPassword($this->passwordEncoder->encodePassword($user, "test123"));
        $roles[] = 'ROLE_USER';
        $user->setRoles($roles);
        $manager->persist($user);

        $manager->flush();
    }
}
