<?php

namespace App\Controller\projects;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CodewarController extends AbstractController
{
    /**
     * @Route("/kata-code/{kata}", name="choose_kata")
     */
    public function chooseKata(Request $request)
    {
        return $this->render('sites/site-codewar.html.twig', [
            'route' => 'codewar',
            'kata' => $request->get('kata'),
        ]);
    }
}
