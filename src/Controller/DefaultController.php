<?php

namespace App\Controller;

use App\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Voiture::class);

        $voitures = $repository->selectionVoiture();

        return $this->render('default/index.html.twig', [
            'voitures' => $voitures,
        ]);
    }

    /**
     * @Route("/info", name="info")
     */
    public function infoPage()
    {
        return $this->render('default/info.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexionPage()
    {
        return $this->render('user/connexion.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/location", name="location")
     */
    public function locationPage()
    {
        return $this->render('default/location.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/modifier_profile", name="modifier_profile")
     */
    public function modifierProfilePage()
    {
        return $this->render('user/modifier.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }



}
