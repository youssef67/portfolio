<?php

namespace App\Controller\projects\udemyRecettes;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{
   /**
     * @Route("/tp_recettes/aliments", name="liste_aliments")
     */
    public function aliments(AlimentRepository $repository)
    {
        $aliments = $repository->findAll();

        return $this->render('sites/udemyRecettes/aliment/listeAliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => false
        ]);
    }

    /**
     * @Route("/tp_recettes/calorie/{calorie}", name="aliments_par_calorie")
     */
    public function alimentParCalories(AlimentRepository $repository, $calorie)
    {
        $aliments = $repository->getAlimentParPropritete('calorie', '<', $calorie);

        return $this->render('sites/udemyRecettes/aliment/listeAliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => true,
            'isGlucide' => false
        ]);
    }

    /**
     * @Route("/aliments/glucide/{glucide}", name="aliments_par_glucide")
     */
    public function alimentsParGlucide(AlimentRepository $repository, $glucide)
    {
        $aliments = $repository->getAlimentParPropritete('glucide', '<' ,$glucide );

        return $this->render('sites/udemyRecettes/aliment/listeAliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => true
        ]);
    }

}
