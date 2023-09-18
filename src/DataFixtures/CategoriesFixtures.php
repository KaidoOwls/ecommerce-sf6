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
        $category= new Categories();
        $category->setLibelle('Cuisine d\'asie')
                ->setSlug($this->slugger->slug($category->getLibelle())->lower())
                ->setActive(1)
                ->setImage('asian_food_cat.jpg');
                $manager->persist($category);

                $category1= new Categories();
                $category1->setLibelle('Burger')
                        ->setSlug($this->slugger->slug($category1->getLibelle())->lower())
                        ->setActive(1)
                        ->setImage('burger_cat.jpg');
                        $manager->persist($category1);

                        $category2= new Categories();
                        $category2->setLibelle('Pâtes')
                                ->setSlug($this->slugger->slug($category->getLibelle())->lower())
                                ->setActive(1)
                                ->setImage('pasta_cat.jpg');
                                $manager->persist($category2);
                
                                $category3= new Categories();
                                $category3->setLibelle('Pizza')
                                        ->setSlug($this->slugger->slug($category1->getLibelle())->lower())
                                        ->setActive(1)
                                        ->setImage('pizza_cat.jpg');
                                        $manager->persist($category3);
// ici
                                        $category4= new Categories();
                                        $category4->setLibelle('Cuisine d\'asie')
                                                ->setSlug($this->slugger->slug($category->getLibelle())->lower())
                                                ->setActive(1)
                                                ->setImage('asian_food_cat.jpg');
                                                $manager->persist($category4);
                                
                                                $category5= new Categories();
                                                $category5->setLibelle('Burger')
                                                        ->setSlug($this->slugger->slug($category1->getLibelle())->lower())
                                                        ->setActive(1)
                                                        ->setImage('burger_cat.jpg');
                                                        $manager->persist($category5);
                                
                                                        $category6= new Categories();
                                                        $category6->setLibelle('Pâtes')
                                                                ->setSlug($this->slugger->slug($category->getLibelle())->lower())
                                                                ->setActive(1)
                                                                ->setImage('pasta_cat.jpg');
                                                                $manager->persist($category6);
                                                
                                                                $category7= new Categories();
                                                                $category7->setLibelle('Pizza')
                                                                        ->setSlug($this->slugger->slug($category1->getLibelle())->lower())
                                                                        ->setActive(1)
                                                                        ->setImage('pizza_cat.jpg');
                                                                        $manager->persist($category7);
                                

        $manager->flush();
    }
    
}
