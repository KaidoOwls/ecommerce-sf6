<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Plat;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

// ajouts des categories
class PlatFixtures extends Fixture implements DependentFixtureInterface
{

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {

        // Récupérez la référence à la catégorie correspondante depuis les fixtures des catégories
        $fastFoodCategory = $this->getReference(CategoriesFixtures::FAST_FOOD_CATEGORY_REFERENCE);
        $traditionalCategory = $this->getReference(CategoriesFixtures::TRADITIONAL_CATEGORY_REFERENCE);


        $plat1 = new Plat();
        $plat1->setLibelle("Wrap");
        $plat1->setDescription("Wrap au poulet");
        $plat1->setPrix("15.10");
        $plat1->setImage('buffalo-chicken.webp');
        $plat1->setActive(1);
        $plat1->setSlug($this->slugger->slug($plat1->getLibelle())->lower());
        $plat1->setCategorie($this->getReference('categorie'. 8)); // Liez le plat à la catégorie Fast Food



        $plat2 = new Plat();
        $plat2->setLibelle("Salade");
        $plat2->setDescription("Salade au poulet accompagné de délicieux crouton intermarché");
        $plat2->setPrix("23.10");
        $plat2->setImage('cesar_salad.jpg');
        $plat2->setActive(1);
        $plat2->setSlug($this->slugger->slug($plat2->getLibelle())->lower());
        $plat2->setCategorie($this->getReference('categorie'. 5)); 



        $plat3 = new Plat();
        $plat3->setLibelle("Hamburger");
        $plat3->setDescription("Hamburger au bacon Halal ");
        $plat3->setPrix("35.99");
        $plat3->setImage('cheesburger.jpg');
        $plat3->setActive(1);
        $plat3->setSlug($this->slugger->slug($plat3->getLibelle())->lower());
        $plat3->setCategorie($this->getReference('categorie'. 2)); 


        $plat4 = new Plat();
        $plat4->setLibelle("Veggie");
        $plat4->setDescription("Courgettes farcies");
        $plat4->setPrix("20.99");
        $plat4->setImage('courgettes_farcies.jpg');
        $plat4->setActive(1);
        $plat4->setSlug($this->slugger->slug($plat4->getLibelle())->lower());
        $plat4->setCategorie($traditionalCategory); 




        $plat5 = new Plat();
        $plat5->setLibelle("Hamburger");
        $plat5->setDescription("Classik Burger");
        $plat5->setPrix("15.00");
        $plat5->setImage('Food-Name-433.jpeg');
        $plat5->setActive(1);
        $plat5->setSlug($this->slugger->slug($plat5->getLibelle())->lower());
        $plat5->setCategorie($fastFoodCategory);

        $plat6 = new Plat();
        $plat6->setLibelle("Wrap");
        $plat6->setDescription("Classik Wrap");
        $plat6->setPrix("15.00");
        $plat6->setImage('Food-Name-3461.jpg');
        $plat6->setActive(1);
        $plat6->setSlug($this->slugger->slug($plat6->getLibelle())->lower());
        $plat6->setCategorie($fastFoodCategory);

        $plat7 = new Plat();
        $plat7->setLibelle("Hamburger");
        $plat7->setDescription("Burger des champs");
        $plat7->setPrix("20.00");
        $plat7->setImage('Food-Name-6340.jpg');
        $plat7->setActive(1);
        $plat7->setSlug($this->slugger->slug($plat7->getLibelle())->lower());
        $plat7->setCategorie($fastFoodCategory);

        $plat8 = new Plat();
        $plat8->setLibelle("Pizza");
        $plat8->setDescription("Healty Pizza");
        $plat8->setPrix("25.00");
        $plat8->setImage('Food-Name-8298.jpg');
        $plat8->setActive(1);
        $plat8->setSlug($this->slugger->slug($plat8->getLibelle())->lower());
        $plat8->setCategorie($fastFoodCategory);

        $plat9 = new Plat();
        $plat9->setLibelle("Hambuger");
        $plat9->setDescription("Hamburger pas mal");
        $plat9->setPrix("25.00");
        $plat9->setImage('hamburger.jpg');
        $plat9->setActive(1);
        $plat9->setSlug($this->slugger->slug($plat9->getLibelle())->lower());
        $plat9->setCategorie($fastFoodCategory);

        $plat10= new Plat();
        $plat10->setLibelle("Veggie");
        $plat10->setDescription("Veggie Lasagne");
        $plat10->setPrix("40.00");
        $plat10->setImage('lasagnes_viande.jpg');
        $plat10->setActive(1);
        $plat10->setSlug($this->slugger->slug($plat10->getLibelle())->lower());
        $plat10->setCategorie($traditionalCategory); 

        $plat11= new Plat();
        $plat11->setLibelle("Veggie");
        $plat11->setDescription("Pain fromage");
        $plat11->setPrix("10.00");
        $plat11->setImage('Food-Name-3631.jpg');
        $plat11->setActive(1);
        $plat11->setSlug($this->slugger->slug($plat11->getLibelle())->lower());
        $plat11->setCategorie($traditionalCategory); 

        $plat12= new Plat();
        $plat12->setLibelle("Pizza");
        $plat12->setDescription("Pizza Margherita");
        $plat12->setPrix("25.00");
        $plat12->setImage('pizza-margherita.jpg');
        $plat12->setActive(1);
        $plat12->setSlug($this->slugger->slug($plat12->getLibelle())->lower());
        $plat12->setCategorie($fastFoodCategory);

        $plat13= new Plat();
        $plat13->setLibelle("Pizza");
        $plat13->setDescription("Pizza Saumon");
        $plat13->setPrix("10.00");
        $plat13->setImage('pizza-salmon.png');
        $plat13->setActive(1);
        $plat13->setSlug($this->slugger->slug($plat13->getLibelle())->lower());
        $plat13->setCategorie($fastFoodCategory);

        $plat14 = new Plat();
        $plat14->setLibelle("Salade");
        $plat14->setDescription("Salade discount");
        $plat14->setPrix("05.00");
        $plat14->setImage('salad1.png');
        $plat14->setActive(1);
        $plat14->setSlug($this->slugger->slug($plat14->getLibelle())->lower());
        $plat14->setCategorie($traditionalCategory); 

        $plat15= new Plat();
        $plat15->setLibelle("Veggie");
        $plat15->setDescription("Spaghetti Legumes");
        $plat15->setPrix("30.00");
        $plat15->setImage('spaghetti-legumes.jpg');
        $plat15->setActive(1);
        $plat15->setSlug($this->slugger->slug($plat15->getLibelle())->lower());
        $plat15->setCategorie($traditionalCategory); 


        $plat16= new Plat();
        $plat16->setLibelle("Veggie");
        $plat16->setDescription("Tagliatelles saumon");
        $plat16->setPrix("20.00");
        $plat16->setImage('tagliatelles-saumon.webp');
        $plat16->setActive(1);
        $plat16->setSlug($this->slugger->slug($plat16->getLibelle())->lower());
        $plat16->setCategorie($traditionalCategory); 





        $manager->persist($plat1);
        $manager->persist($plat2);
        $manager->persist($plat3);
        $manager->persist($plat4);
        $manager->persist($plat5);
        $manager->persist($plat6);
        $manager->persist($plat7);
        $manager->persist($plat8);
        $manager->persist($plat9);
        $manager->persist($plat10);
        $manager->persist($plat11);
        $manager->persist($plat12);
        $manager->persist($plat13);
        $manager->persist($plat14);
        $manager->persist($plat15);
        $manager->persist($plat16);


        $manager->flush();

    }

    public function getDependencies()
    {
       return [
          CategoriesFixtures::class  
       ];
    }
}