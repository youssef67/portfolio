<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/home.html.twig', [
            'route' => 'home'
        ]);
    }

    /**
     * @Route("/resume", name="resume")
     */
    public function resume()
    {
        return $this->render('home/resume.html.twig', [
            'route' => 'resume'
        ]);
    }

    /**
     * @Route("/download", name="download_resume")
     */
    public function downloadResume()
    {
        $response = new BinaryFileResponse(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'public/images/cv-youssef-moudni.pdf');
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, 'cv-youssef-moudni.pdf');
        return $response;
    }
}
