<?php

namespace App\Controller\projects\udemyAnimaux;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    /**
     * @Route("/tp_animal/animaux", name="liste_animaux")
     */
    public function animaux(AnimalRepository $repository)
    {
        $animaux = $repository->findAll();
        return $this->render('sites/udemyAnimaux/animal/listeAnimaux.html.twig', [
            'route' => 'udemyAnimaux',
            'animaux' => $animaux
        ]);
    }

    /**
     * @Route("/tp_animal/animal/{id}", name="afficher_animal")
     */
    public function afficherAnimal(Animal $animal)
    {
        return $this->render('sites/udemyAnimaux/animal/afficherAnimal.html.twig', [
            'route' => 'udemyAnimaux',
            'animal' => $animal
        ]);
    }
}
