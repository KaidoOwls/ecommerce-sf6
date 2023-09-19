<?php

namespace App\Controller;

use App\Entity\Plat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/plats', name: 'plats_')]
class PlatController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('plat/index.html.twig');
    }
// Accolade permet de récup l'id avec slug
    #[Route('/{slug}', name: 'details')]
    public function details(Plat $plat): Response
    
    {   
        return $this->render('plat/details.html.twig', compact('plat'));

    }
}
