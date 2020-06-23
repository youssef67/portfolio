<?php

namespace App\Controller\projects\udemyAnimaux;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    /**
     * @Route("/tp_animal/personnes", name="liste_personnes")
     */
    public function personnes(PersonneRepository $repository)
    {
        $personnes = $repository->findAll();

        return $this->render('sites/udemyAnimaux/personne/listePersonnes.html.twig', [
            'route' => 'udemyAnimaux',
            'personnes' => $personnes
        ]);
    }

    /**
     * @Route("/tp_animal/personne/{id}", name="afficher_personne")
     */
    public function afficherPersonnes(Personne $personne)
    {
        return $this->render('sites/udemyAnimaux/personne/afficherPersonne.html.twig', [
            'route' => 'udemyAnimaux',
            'personne' => $personne
        ]);
    }
}
