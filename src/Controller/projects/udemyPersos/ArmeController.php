<?php

namespace App\Controller\projects\udemyPersos;

use App\Entity\personnage\Arme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArmeController extends AbstractController
{
    /**
     * @Route("/udemy/armes", name="armes")
     */
    public function armes()
    {
        Arme::CreerArmes();

        return $this->render('sites/udemyPersos/arme/armes.html.twig', [
            'armes' => Arme::$armes
        ]);
    }

    /**
     * @Route("/arme/{nom}", name="afficher_arme")
     */
    public function getArmeParNom($nom)
    {
        Arme::CreerArmes();

        return $this->render('sites/udemyPersos/arme/arme.html.twig', [
            'arme' => Arme::getArmeParNom($nom)
        ]);
    }
}