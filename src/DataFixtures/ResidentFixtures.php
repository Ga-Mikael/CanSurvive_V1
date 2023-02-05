<?php

namespace App\DataFixtures;

use App\Entity\Resident;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ResidentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $resident = new Resident();

        $resident->setFirstname('Jean');
        $resident->setLastname('Doe');
        $resident->setDailyComsumption(3);
        $resident->setBunkerHost($this->getReference('bunker_1'));
        $manager->persist($resident);

        $resident2 = new Resident();

        $resident2->setFirstname('Jeanne');
        $resident2->setLastname('Doe');
        $resident2->setDailyComsumption(2);
        $resident2->setBunkerHost($this->getReference('bunker_1'));
        $manager->persist($resident2);

        $resident3 = new Resident();

        $resident3->setFirstname('Ragak');
        $resident3->setLastname('Agak');
        $resident3->setDailyComsumption(1);
        $resident3->setBunkerHost($this->getReference('bunker_1'));
        $manager->persist($resident3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [

            BunkerFixtures::class,

        ];
    }
}
