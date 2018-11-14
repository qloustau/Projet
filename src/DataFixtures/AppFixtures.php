<?php

namespace App\DataFixtures;

use App\Entity\Personne;
use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;




class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));


        $nombrekm = [
            '154544',
            '216546',
            '65333',
            '97444',
            '12000',
            '154544',
            '216546',
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
            $voiture->setImages($faker->imageUrl(100,100));
            $manager->persist($voiture);
        }

        $manager->flush();

        $user = new Personne();
        $user->setNom('Doe');
        $user->setPrenom('John');
        $user->setEmail('test@gmail.com');

        $password = $this->encoder->encodePassword($user, 'test');
        $user->setMdp($password);

        $manager->persist($user);
        $manager->flush();
    }
}