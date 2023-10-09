<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use App\Form\PlatsFormType;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/plats', name:'admin_plats_')]
class PlatsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/plats/index.html.twig');

    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger, PictureService $pictureService): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // on crée un "nouveau plat"

        $plat = new Plat();

        // on crée le formulaire
        $platForm = $this->createForm(PlatsFormType::class, $plat);

        // on traite la requête du formulaire
        $platForm->handleRequest($request);

        // on vérifie si le formulaire est soumis et valide
        if($platForm->isSubmitted() && $platForm->isValid()){

            // on récupère les images 
            $images = $platForm->get('image')->getData();

            

            foreach($images as $image){
                // on définit le dossier de destination
                $folder = 'plats';

                // on appelle le service d'ajout 
                $fichier = $pictureService->add($image, $folder, 300, 300);
                
                // On stocke le chemin de l'image dans l'entité Plat
                $plat->setImage($fichier);
            }


            // on génère le slug 
            $slug = $slugger->slug($plat->getLibelle());
            $plat->setSlug($slug);

            // On arrondit le prix 
            $prix = $plat->getPrix();
            $plat->setPrix($prix);


            // on stock dans la base de données
            $em->persist($plat);
            $em->flush();

            $this->addFlash('success', 'Plat ajouté avec succés');

            // on redirige dans la base de données
            return $this->redirectToRoute('admin_plats_index');
        }

        //return $this->render('admin/plats/add.html.twig',[
        //  'platForm' => $platForm->createView()
        // ]);
        return $this->renderForm('admin/plats/add.html.twig', compact('platForm'));
        // compact c'est égal à ['productFrom' => $productForm]
    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Plat $plat, Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        // on vérifie si l'utilisateur peut éditer avec le voter
        $this->denyAccessUnlessGranted('PLAT_EDIT', $plat);

        // on crée le formulaire
        $platForm = $this->createForm(PlatsFormType::class, $plat);

        // on traite la requête du formulaire
        $platForm->handleRequest($request);

        // on vérifie si le formulaire est soumis et valide
        if($platForm->isSubmitted() && $platForm->isValid()){
            // on génère le slug 
            $slug = $slugger->slug($plat->getLibelle());
            $plat->setSlug($slug);

            // On arrondit le prix 
            $prix = $plat->getPrix();
            $plat->setPrix($prix);


            // on stock dans la base de données
            $em->persist($plat);
            $em->flush();

            $this->addFlash('success', 'Plat modifié avec succés');

            // on redirige dans la base de données
            return $this->redirectToRoute('admin_plats_index');
        }

        return $this->render('admin/plats/edit.html.twig',[
            'platForm' => $platForm->createView(),
            'plat'=> $plat
            ]);
        //return $this->renderForm('admin/plats/edit.html.twig', compact('platForm'));
        // compact c'est égal à ['productFrom' => $productForm]        return $this->render('admin/plats/index.html.twig');

    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Plat $plat): Response
    {
        // on vérifie si l'utilisateur peut supprimer avec le voter
        $this->denyAccessUnlessGranted('PLAT_DELETE', $plat);        
        
        return $this->render('admin/plats/index.html.twig');

    }

}