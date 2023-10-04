<?php

namespace App\Controller;


use App\Entity\Categories;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
// Accolade permet de récup l'id avec slug
    #[Route('/{slug}', name: 'list')]
    public function list(Categories $category, PlatRepository $platRepository, Request $request): Response
    
    {   
        // on va chercher le numéro de page dans l'url 
        $page = $request->query->getInt('page', 1);


        // on va chercher la list des plats de la catégorie le chiffre à la fin permet de choisir combien on veut en voir
        $plat = $platRepository->findPlatPaginated($page, $category->getSlug(), 2);

        return $this->render('categories/list.html.twig', compact('category','plat'));

    }
}
