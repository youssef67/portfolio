<?php

namespace App\Controller\projects\udemyPersos;

use App\Entity\personnage\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonnageController extends AbstractController
{
    /**
     * @Route("/udemy/personnages", name="personnages")
     */
    public function personnages()
    {
        Personnage::creerPersonnage();
        return $this->render('sites/udemyPersos/personnage/personnages.html.twig', [
            'route' => 'udemyPersos',
            'players' => Personnage::$personnages
        ]);
    }

    /**
     * @Route("/udemy/personnages/{nom}", name="afficher_personnage")
     */
    public function afficherPerso($nom)
    {
        Personnage::creerPersonnage();

        return $this->render('sites/udemyPersos/personnage/personnage.html.twig', [
            'route' => 'udemyPersos',
            'perso' => Personnage::getPersonnageParNom($nom)
        ]);
    }
}
