<?php

namespace App\DataFixtures;

use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));


        $nombrekm = [
            '15454487',
            '21654644',
            '65333',
            '97444',
            '12000',
            '15454487',
            '21654644',
            '65333',
            '97444',
            '12000',
        ];

        $disponibilites = [
            true,
            false,
            true,
            true,
            false,
            true,
            false,
            true,
            true,
            false,
        ];

        $reservoirs = [
            '10',
            '25',
            '75',
            '100',
            '45',
            '10',
            '25',
            '75',
            '100',
            '45'
        ];

        for ($i = 0; $i < 10; $i++) {
            $voiture = new Voiture();
            $voiture->setImmat($faker->vehicleRegistration);
            $voiture->setMarque($faker->vehicle);
            $voiture->setKmTotal($nombrekm [$i]);
            $voiture->setDescriptif($faker->vehicleType);
            $voiture->setDisponibilite($disponibilites [$i]);
            $voiture->setReservoir($reservoirs [$i]);
            $manager->persist($voiture);
        }

        $manager->flush();
    }
}