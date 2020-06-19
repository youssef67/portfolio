<?php

namespace App\Controller\projects;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OcrController extends AbstractController
{
    /**
     * @Route("/ocr/{tp}", name="choose_tp")
     */
    public function chooseTP(Request $request)
    {
        return $this->render('sites/tp-' . $request->get('tp') .'.html.twig', [
            'route' => 'tp-ocr'
        ]);
    }
}
