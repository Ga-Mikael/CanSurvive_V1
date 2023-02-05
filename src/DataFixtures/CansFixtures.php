<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Can;
use App\Entity\Bunker;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;



class CansFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create();

        for($i = 0; $i < 300; $i++) {

            $can = new Can();
            $j = $faker->numberBetween(1,2);
            //Ce Faker va nous permettre d'alimenter l'instance de can que l'on souhaite ajouter en base

            $can->setName($faker->word());
           /*  $can->setBunkerStock('' .$j); */
            $can->setExpirationDate($faker->dateTimeBetween('now', '+10 year'));
            $can->setBarCode($faker->randomNumber(6, true));
            $manager->persist($can);

        }
        


        $manager->flush();
    }
}
