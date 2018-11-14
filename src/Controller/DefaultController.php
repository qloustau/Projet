<?php

namespace App\Controller;

use App\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
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
     * @Route("/info/{id}", name="info")
     */
    public function infoPage(Request $request)
    {

        $repository = $this->getDoctrine()
                    ->getRepository(Voiture::class)
        ;


        $voiture = $repository->infoPourChaqueVoiture($request->get('id'));

        dump($voiture);

        return $this->render('default/info.html.twig', [
            'voitures' => $voiture,
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
