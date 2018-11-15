<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\LieuReceptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Voiture::class);


        $tabLieux = [];


        $form = $this->createForm(LieuReceptionType::class, $tabLieux, [
            'method' => 'GET',
        ]);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {


            $numDuLieu = $form->get('lieuReception')->getData();
            $tabLieux = $repository->recupererParLieuxDeReception();
            if ($numDuLieu != 'Tous'){
                $lieu = array_flip($tabLieux)[$numDuLieu];
            }
            else{
                $lieu = '';
            }



            $voitures = $repository->selectionVoitureParLieuReception($lieu);
        }else{
            $voitures = $repository->selectionVoiture();
        }


        return $this->render('default/index.html.twig', [
            'voitures' => $voitures,
            'form' => $form->createView(),
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
     * @Route("/location/{id}", name="location")
     */
    public function locationPage(Request $request)
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
     * @Route("/modifier_profile", name="modifier_profile")
     */
    public function modifierProfilePage()
    {
        return $this->render('user/modifier.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }



}
