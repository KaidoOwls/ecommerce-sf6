<?php

namespace App\Controller;


use App\Entity\Categories;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/categories', name: 'categories_')]
class CategoriesController extends AbstractController
{
// Accolade permet de récup l'id avec slug
    #[Route('/{slug}', name: 'list')]
    public function list(Categories $category, PlatRepository $platRepository): Response
    
    {   
        // on va chercher la list des plats de la catégorie
        $plat = $platRepository->findPlatPaginated(1, $category->getSlug(), 2);

        dd($plat);

        return $this->render('categories/list.html.twig', compact('category','plat'));

    }
}
