<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {

        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('mika@gmail.com');
        $user->setRoles(['ROLE_USER']);
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            'mikamika'
        );
        $user->setPassword($hashedPassword);
        $user->setFirstname('Mika');
        $user->setLastname('Mika');
        $user->setDailyComsumption(3);
        $user->setBunker($this->getReference('bunker_1'));
        $this->addReference('user_', $user);
        $manager->persist($user);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [

            BunkerFixtures::class,

        ];
    }
}
