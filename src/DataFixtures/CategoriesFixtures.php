<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    
    public function __construct(private SluggerInterface $slugger){}


    public function load(ObjectManager $manager): void
    {
        $category1= new Categories();
        $category1->setLibelle('Cuisine d\'asie')
                ->setSlug($this->slugger->slug($category1->getLibelle())->lower())
                ->setActive(1)
                ->setImage('asian_food_cat.jpg');
                $manager->persist($category1);

                $category2= new Categories();
                $category2->setLibelle('Burger')
                        ->setSlug($this->slugger->slug($category2->getLibelle())->lower())
                        ->setActive(1)
                        ->setImage('burger_cat.jpg');
                        $manager->persist($category2);

                        $category3= new Categories();
                        $category3->setLibelle('Pâtes')
                                ->setSlug($this->slugger->slug($category3->getLibelle())->lower())
                                ->setActive(1)
                                ->setImage('pasta_cat.jpg');
                                $manager->persist($category3);
                
                                $category4= new Categories();
                                $category4->setLibelle('Pizza')
                                        ->setSlug($this->slugger->slug($category4->getLibelle())->lower())
                                        ->setActive(1)
                                        ->setImage('pizza_cat.jpg');
                                        $manager->persist($category4);
// ici
                                        $category5= new Categories();
                                        $category5->setLibelle('Salade')
                                                ->setSlug($this->slugger->slug($category5->getLibelle())->lower())
                                                ->setActive(1)
                                                ->setImage('salade_cat.jpg');
                                                $manager->persist($category5);
                                
                                                $category6= new Categories();
                                                $category6->setLibelle('Sandwich')
                                                        ->setSlug($this->slugger->slug($category6->getLibelle())->lower())
                                                        ->setActive(1)
                                                        ->setImage('sandwich_cat.jpg');
                                                        $manager->persist($category6);
                                
                                                        $category7= new Categories();
                                                        $category7->setLibelle('Veggie')
                                                                ->setSlug($this->slugger->slug($category7->getLibelle())->lower())
                                                                ->setActive(1)
                                                                ->setImage('veggie_cat.jpg');
                                                                $manager->persist($category7);
                                                
                                                                $category8= new Categories();
                                                                $category8->setLibelle('Wrap')
                                                                        ->setSlug($this->slugger->slug($category8->getLibelle())->lower())
                                                                        ->setActive(1)
                                                                        ->setImage('wrap_cat.jpg');
                                                                        $manager->persist($category8);
                                

        $manager->flush();
}

}
