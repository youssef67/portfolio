<?php

namespace App\Controller\projects\udemyRecettes\Admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/tp_recettes/admin/aliments", name="admin_aliments")
     */
    public function adminAliments(AlimentRepository $repository)
    {
        $aliments = $repository->findAll();

        return $this->render('sites/udemyRecettes/admin/adminAliments.html.twig', [
            'aliments' => $aliments,
        ]);
    }

    /**
     * @Route("/tp_recette/admin/aliment/{id}", name="admin_aliment_modification",  methods="GET|POST")
     * @Route("/tp_recette/admin/aliment/ajout", name="admin_aliment_ajout")
     */
    public function ajoutEtModif(Aliment $aliment = null, Request $request, EntityManagerInterface $entityManager)
    {
        if (!$aliment)
        {
            $aliment = new Aliment(); 
        }

        $form = $this->createForm(AlimentType::class, $aliment);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $modif = $aliment->getId() !== null;
            $entityManager->persist($aliment);
            $entityManager->flush();
            $this->addFlash("success", $modif ? "la modification a été effectuée" : "l'ajout a été effectuée");
            return $this->redirectToRoute("admin_aliments");
        }
        
        return $this->render('sites/udemyRecettes/admin/modifEtAjoutAliment.html.twig', [
            'aliment' => $aliment,
            'form' => $form->createView(),
            'isModification' => $aliment->getId() !== null
        ]);
    }

    /**
     * @Route("/tp_recettes/admin/aliment/{id}", name="admin_aliment_suppression", methods="delete")
     */
    public function suppression(Aliment $aliment, Request $request, EntityManagerInterface $entityManager)
    { 
        if ($this->isCsrfTokenValid("SUP" . $aliment->getId(), $request->get('_token')))
        {
            $entityManager->remove($aliment);
            $entityManager->flush();
            $this->addFlash("success", "la suppression a été effectuée");
            return $this->redirectToRoute("admin_aliments");  
        }
    }
}
