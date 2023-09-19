<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
public function __construct(private SluggerInterface $slugger) {}

public const FAST_FOOD_CATEGORY_REFERENCE = 'fast_food_category';
public const TRADITIONAL_CATEGORY_REFERENCE = 'traditional_category';


public function load(ObjectManager $manager): void
{
$parent = new Categories();
$parent->setLibelle('Fast Food')
        ->setSlug($this->slugger->slug($parent->getLibelle())->lower())
        ->setActive(1)
        ->setImage('wrap_cat.jpg')
        ->setCategoryOrder(1);
$this->addReference(self::FAST_FOOD_CATEGORY_REFERENCE, $parent);
$manager->persist($parent);

        $parent1 = new Categories();
        $parent1->setLibelle('Plat traditionnel')
                ->setSlug($this->slugger->slug($parent1->getLibelle())->lower())
                ->setActive(1)
                ->setImage('wrap_cat.jpg')
                ->setCategoryOrder(2);
        $this->addReference(self::TRADITIONAL_CATEGORY_REFERENCE, $parent1);
        $manager->persist($parent1);

                        $category1 = new Categories();
                        $category1->setLibelle('Cuisine d\'asie')
                                ->setSlug($this->slugger->slug($category1->getLibelle())->lower())
                                ->setActive(1)
                                ->setImage('asian_food_cat.jpg')
                                ->setParent($parent1)
                                ->setCategoryOrder(2);
                                $this->addReference('categorie1', $category1);
                        $manager->persist($category1);


                                                $category2 = new Categories();
                                                $category2->setLibelle('Hamburger')
                                                        ->setSlug($this->slugger->slug($category2->getLibelle())->lower())
                                                        ->setActive(1)
                                                        ->setImage('burger_cat.jpg')
                                                        ->setParent($parent)
                                                        ->setCategoryOrder(1);
                                                        $this->addReference('categorie2', $category2);
                                                $manager->persist($category2);

                                                                        $category3 = new Categories();
                                                                        $category3->setLibelle('Pâtes')
                                                                                ->setSlug($this->slugger->slug($category3->getLibelle())->lower())
                                                                                ->setActive(1)
                                                                                ->setImage('pasta_cat.jpg')
                                                                                ->setParent($parent1)
                                                                                ->setCategoryOrder(2);
                                                                                $this->addReference('categorie3', $category3);
                                                                        $manager->persist($category3);

                                                $category4 = new Categories();
                                                $category4->setLibelle('Pizza')
                                                        ->setSlug($this->slugger->slug($category4->getLibelle())->lower())
                                                        ->setActive(1)
                                                        ->setImage('pizza_cat.jpg')
                                                        ->setParent($parent)
                                                        ->setCategoryOrder(1);
                                                        $this->addReference('categorie4', $category4);
                                                $manager->persist($category4);

                        $category5 = new Categories();
                        $category5->setLibelle('Salade')
                                ->setSlug($this->slugger->slug($category5->getLibelle())->lower())
                                ->setActive(1)
                                ->setImage('salade_cat.jpg')
                                ->setParent($parent1)
                                ->setCategoryOrder(2);
                                $this->addReference('categorie5', $category5);
                        $manager->persist($category5);

        $category6 = new Categories();
        $category6->setLibelle('Sandwich')
                ->setSlug($this->slugger->slug($category6->getLibelle())->lower())
                ->setActive(1)
                ->setImage('sandwich_cat.jpg')
                ->setParent($parent)
                ->setCategoryOrder(1);
                $this->addReference('categorie6', $category6);
        $manager->persist($category6);

                                $category7 = new Categories();
                                $category7->setLibelle('Veggie')
                                        ->setSlug($this->slugger->slug($category7->getLibelle())->lower())
                                        ->setActive(1)
                                        ->setImage('veggie_cat.jpg')
                                        ->setParent($parent1)
                                        ->setCategoryOrder(2);
                                        $this->addReference('categorie7', $category7);
                                $manager->persist($category7);

                                                $category8 = new Categories();
                                                $category8->setLibelle('Wrap')
                                                        ->setSlug($this->slugger->slug($category8->getLibelle())->lower())
                                                        ->setActive(1)
                                                        ->setImage('wrap_cat.jpg')
                                                        ->setParent($parent)
                                                        ->setCategoryOrder(1);
                                                        $this->addReference('categorie8', $category8);
                                                $manager->persist($category8);

        // test

        $manager->flush();
        }
        }
