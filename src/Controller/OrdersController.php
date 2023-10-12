<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Entity\OrdersDetails;
use App\Repository\PlatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commandes', name: 'app_orders_')]

class OrdersController extends AbstractController
{
    #[Route('/ajout', name: 'add')]
    public function add(SessionInterface $session, PlatRepository $platRepository, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier',  []);

        if($panier === []){
            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('main');
        }
        
        // le panier n'est pas vide, on crée la commande 
        $order = new Orders();

        // on remplit la commande 
        $order->setUsers($this->getUser());
        $order->setReference(uniqid());

        // on parcourt le panier pour créer les détails de la commande
        foreach($panier as $item => $quantity){
            $orderDetails = new OrdersDetails();

            // on va chercher le produit 
            $plat = $platRepository->find($item);
            
            $prix = $plat->getPrix();

            // on crée le détail de commande
            $orderDetails->setPlat($plat);
            $orderDetails->setPrix($prix);
            $orderDetails->setQuantity($quantity);

            $order->addOrdersDetail($orderDetails);
        }

        // on persist et on flush
        $em->persist($order);
        $em->flush();

        $session->remove('panier');

        $this->addFlash('message', 'Commande crée avec succés');
        return $this->redirectToRoute('main');

    }
}
