<?php

namespace App\Controller\projects\udemyAnimaux;

use App\Entity\Famille;
use App\Repository\FamilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FamilleController extends AbstractController
{
    /**
     * @Route("/tp_animal/familles", name="liste_familles")
     */
    public function famille(FamilleRepository $repository)
    {
        $familles = $repository->findAll();
        
        return $this->render('sites/udemyAnimaux/famille/listeFamilles.html.twig', [
            'route' => 'udemyAnimaux',
            'familles' => $familles
        ]);
    }

    /**
     * @Route("/tp_animal/famille/{id}", name="afficher_famille")
     */
    public function afficherFamille(Famille $famille)
    {
        return $this->render('sites/udemyAnimaux/famille/afficherFamille.html.twig', [
            'route' => 'udemyAnimaux',
            'famille' => $famille
        ]);
    }
}
