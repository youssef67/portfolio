<?php

namespace App\Controller\projects\ocr;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CombatController extends AbstractController
{
    /**
     * @Route("/combat", name="combat")
     */
    public function index()
    {
        return $this->render('combat/index.html.twig', [
            'controller_name' => 'CombatController',
        ]);
    }
}
