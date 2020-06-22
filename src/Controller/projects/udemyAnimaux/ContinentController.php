<?php

namespace App\Controller\projects\udemyAnimaux;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContinentController extends AbstractController
{
    /**
     * @Route("/tp_animal/continents", name="liste_continents")
     */
    public function continents(ContinentRepository $repository)
    {
        $continents = $repository->findAll();

        return $this->render('sites/udemyAnimaux/continent/listeContinents.html.twig', [
            'route' => 'udemyAnimaux',
            'continents' => $continents
        ]);
    }

    /**
     * @Route("/tp_animal/continent/{id}", name="afficher_continent")
     */
    public function continent(Continent $continent)
    {
        return $this->render('sites/udemyAnimaux/continent/afficherContinent.html.twig', [
            'route' => 'udemyAnimaux',
            'continent' => $continent
        ]);
    }
}
