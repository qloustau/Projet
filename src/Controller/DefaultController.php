<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        $faker = \Faker\Factory::create();

// generate data by accessing properties
        echo $faker->name;
        // 'Lucy Cechtelar';
        echo $faker->address;
        // "426 Jordy Lodge
        // Cartwrightshire, SC 88120-6700"
        echo $faker->text;
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
