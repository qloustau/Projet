<?php

namespace App\Controller;

use App\Entity\Utilisation;
use App\Entity\Voiture;
use App\Form\ResaType;
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
     * @Route("/location", name="location")
     */
    public function locationPage(Request $request)
    {
        $utilisation = New Utilisation();
        $form = $this->createForm(ResaType::class, $utilisation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisation);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            return $this->redirectToRoute('location');
        }

        return $this->render('default/location.html.twig', [
            'form' => $form->createView(),
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
