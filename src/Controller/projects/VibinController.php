<?php

namespace App\Controller\projects;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VibinController extends AbstractController
{
    /**
     * @Route("/projet/vibin", name="site_vibin")
     */
    public function viewSite()
    {
        return $this->render('sites/site-vibin.html.twig', [
            'route' => 'projet_vibin'
        ]);
    }

    /**
     * @Route("/vibin/add", name="addEmail")
     */
    public function addEmail()
    {
        dd('toto');
        return $this->render('sites/site-vibin.html.twig', [
            'route' => 'projet_vibin'
        ]);
    }
}
