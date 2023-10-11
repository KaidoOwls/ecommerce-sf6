<?php

namespace App\Controller;

use App\Entity\Plat;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[Route('/cart', name:'cart_')]
class CartController extends AbstractController
{
    #[Route('/add/{id}', name: 'add')]
    public function add(Plat $plat, SessionInterface $session)
    {

        // on récupère l'id du plat
        $id = $plat->getId();

        // on récupère le panier existant 
        $panier = $session->get('panier', []);


        // on ajoute le plat dans le panier s'il n'y est pas encore sinon on incrémente sa quantité
        if(empty($panier[$id])){
            $panier[$id] = 1;
        }else{
            $panier[$id]++;
        }

        $session->set('panier', $panier);
        
        // on redirige vers la page du panier 
    }
}