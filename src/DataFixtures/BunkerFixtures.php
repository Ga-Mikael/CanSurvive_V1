<?php

namespace App\DataFixtures;

use App\Entity\Bunker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BunkerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $bunker = new Bunker();

        $bunker->setName('Vault-202');
        $bunker->setStockCapacity(200);
        $bunker->setResidentCapacity(3);
        $this->addReference("bunker_1", $bunker);
        $manager->persist($bunker);

        $bunker2 = new Bunker();

        $bunker2->setName('Cal-3a3');
        $bunker2->setStockCapacity(300);
        $bunker2->setResidentCapacity(5);
        $this->addReference("bunker_2", $bunker2);
        $manager->persist($bunker2);

        $manager->flush();
    }
}
