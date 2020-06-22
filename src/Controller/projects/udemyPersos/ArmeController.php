<?php

namespace App\Controller\projects\udemyPersos;

use App\Entity\personnage\Arme;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArmeController extends AbstractController
{
    /**
     * @Route("/tp_personnage/armes", name="liste_armes")
     */
    public function armes()
    {
        Arme::CreerArmes();

        return $this->render('sites/udemyPersos/arme/armes.html.twig', [
            'armes' => Arme::$armes
        ]);
    }

    /**
     * @Route("/tp_personnage/arme/{nom}", name="afficher_arme")
     */
    public function getArmeParNom($nom)
    {
        Arme::CreerArmes();

        return $this->render('sites/udemyPersos/arme/arme.html.twig', [
            'arme' => Arme::getArmeParNom($nom)
        ]);
    }
}