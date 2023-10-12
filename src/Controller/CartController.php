<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


#[Route('/cart', name:'cart_')]
class CartController extends AbstractController
{   
    #[Route('/', name: 'index')]
    public function index(SessionInterface $session, PlatRepository $platRepository)
    {
        $panier = $session->get('panier',[]);
        
        // onn initialise des variables 
        $data = [];
        $total = 0;

        foreach($panier as $id => $quantity){
            $plat = $platRepository->find($id);

            $data[] = [
                'plat' => $plat,
                'quantity' => $quantity
            ];
            $total += $plat->getPrix() * $quantity;
        }
        return $this->render('cart/index.html.twig', compact('data', 'total'));
    }




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
        return $this->redirectToRoute(('cart_index'));
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(Plat $plat, SessionInterface $session)
    {

        // on récupère l'id du plat
        $id = $plat->getId();

        // on récupère le panier existant 
        $panier = $session->get('panier', []);


        // on retire le plat du panier s'il n'y a qu'un exemplaire sinon on décrémente sa quantité
        if(!empty($panier[$id])){
            if($panier[$id] > 1){
            $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
        }

        $session->set('panier', $panier);
        
        // on redirige vers la page du panier 
        return $this->redirectToRoute(('cart_index'));
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Plat $plat, SessionInterface $session)
    {

        // on récupère l'id du plat
        $id = $plat->getId();

        // on récupère le panier existant 
        $panier = $session->get('panier', []);


        
        if(!empty($panier[$id])){
                unset($panier[$id]);
        }

        $session->set('panier', $panier);
        
        // on redirige vers la page du panier 
        return $this->redirectToRoute(('cart_index'));
    }
    
    #[Route('/empty', name: 'empty')]
    public function empty(SessionInterface $session)
    {
        $session->remove('panier');

        return $this->redirectToRoute(('cart_index'));

    }
}