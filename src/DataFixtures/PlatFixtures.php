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
        $plat1->setLibelle("Wrap au poulet");
        $plat1->setDescription("Wrap avec une sauce mafé");
        $plat1->setPrix("15.10");
        $plat1->setImage('buffalo-chicken.webp');
        $plat1->setActive(1);
        $plat1->setSlug($this->slugger->slug($plat1->getLibelle())->lower());
        $plat1->setCategorie($this->getReference('categorie'. 8)); // Liez le plat à la catégorie Fast Food



        $plat2 = new Plat();
        $plat2->setLibelle("Salade au crouton");
        $plat2->setDescription("Salade au poulet accompagné de délicieux crouton intermarché");
        $plat2->setPrix("23.10");
        $plat2->setImage('cesar_salad.jpg');
        $plat2->setActive(1);
        $plat2->setSlug($this->slugger->slug($plat2->getLibelle())->lower());
        $plat2->setCategorie($this->getReference('categorie'. 5)); 



        $plat3 = new Plat();
        $plat3->setLibelle("Hamburger au bacon");
        $plat3->setDescription("Hamburger au bacon Halal ");
        $plat3->setPrix("35.99");
        $plat3->setImage('cheesburger.jpg');
        $plat3->setActive(1);
        $plat3->setSlug($this->slugger->slug($plat3->getLibelle())->lower());
        $plat3->setCategorie($this->getReference('categorie'. 2)); 


        $plat4 = new Plat();
        $plat4->setLibelle("Courgette farcies ");
        $plat4->setDescription("Courgettes farcies pas trés bonne");
        $plat4->setPrix("20.99");
        $plat4->setImage('courgettes_farcies.jpg');
        $plat4->setActive(1);
        $plat4->setSlug($this->slugger->slug($plat4->getLibelle())->lower());
        $plat4->setCategorie($this->getReference('categorie'. 7)); 




        $plat5 = new Plat();
        $plat5->setLibelle("Hamburger classik");
        $plat5->setDescription("Classik Burger intermarché belek");
        $plat5->setPrix("15.00");
        $plat5->setImage('Food-Name-433.jpeg');
        $plat5->setActive(1);
        $plat5->setSlug($this->slugger->slug($plat5->getLibelle())->lower());
        $plat5->setCategorie($this->getReference('categorie'. 2)); 


        $plat6 = new Plat();
        $plat6->setLibelle("Wrap classik");
        $plat6->setDescription("Classik Wrap de chez diouf");
        $plat6->setPrix("15.00");
        $plat6->setImage('Food-Name-3461.jpg');
        $plat6->setActive(1);
        $plat6->setSlug($this->slugger->slug($plat6->getLibelle())->lower());
        $plat6->setCategorie($this->getReference('categorie'. 8));

        $plat7 = new Plat();
        $plat7->setLibelle("Hamburger des champs");
        $plat7->setDescription("Burger des champs de Beauvais");
        $plat7->setPrix("20.00");
        $plat7->setImage('Food-Name-6340.jpg');
        $plat7->setActive(1);
        $plat7->setSlug($this->slugger->slug($plat7->getLibelle())->lower());
        $plat7->setCategorie($this->getReference('categorie'. 2)); 

        $plat8 = new Plat();
        $plat8->setLibelle("Pizza healty");
        $plat8->setDescription("Healty Pizza pour les gros");
        $plat8->setPrix("25.00");
        $plat8->setImage('Food-Name-8298.jpg');
        $plat8->setActive(1);
        $plat8->setSlug($this->slugger->slug($plat8->getLibelle())->lower());
        $plat8->setCategorie($this->getReference('categorie'. 4)); 

        $plat9 = new Plat();
        $plat9->setLibelle("Hambuger pas mal ");
        $plat9->setDescription("Hamburger pas mal mais vraiment pas mal du tout");
        $plat9->setPrix("25.00");
        $plat9->setImage('hamburger.jpg');
        $plat9->setActive(1);
        $plat9->setSlug($this->slugger->slug($plat9->getLibelle())->lower());
        $plat9->setCategorie($this->getReference('categorie'. 2)); 

        $plat10= new Plat();
        $plat10->setLibelle("lasagne");
        $plat10->setDescription("Veggie Lasagne avec du poulet");
        $plat10->setPrix("40.00");
        $plat10->setImage('lasagnes_viande.jpg');
        $plat10->setActive(1);
        $plat10->setSlug($this->slugger->slug($plat10->getLibelle())->lower());
        $plat10->setCategorie($this->getReference('categorie'. 7));  

        $plat11= new Plat();
        $plat11->setLibelle("Pain fromage");
        $plat11->setDescription("Pain fromage de chez Doullens");
        $plat11->setPrix("10.00");
        $plat11->setImage('Food-Name-3631.jpg');
        $plat11->setActive(1);
        $plat11->setSlug($this->slugger->slug($plat11->getLibelle())->lower());
        $plat11->setCategorie($this->getReference('categorie'. 7)); 

        $plat12= new Plat();
        $plat12->setLibelle("Pizza Margherita");
        $plat12->setDescription("Pizza Margherita sauce babtou");
        $plat12->setPrix("25.00");
        $plat12->setImage('pizza-margherita.jpg');
        $plat12->setActive(1);
        $plat12->setSlug($this->slugger->slug($plat12->getLibelle())->lower());
        $plat12->setCategorie($this->getReference('categorie'. 4)); 

        $plat13= new Plat();
        $plat13->setLibelle("Pizza au saumon");
        $plat13->setDescription("Pizza Saumon mais en vrai c'est de la truite");
        $plat13->setPrix("10.00");
        $plat13->setImage('pizza-salmon.png');
        $plat13->setActive(1);
        $plat13->setSlug($this->slugger->slug($plat13->getLibelle())->lower());
        $plat13->setCategorie($this->getReference('categorie'. 4)); 

        $plat14 = new Plat();
        $plat14->setLibelle("Salade discount ");
        $plat14->setDescription("Salade discount en vrai c'est l'herbe de mon jardin");
        $plat14->setPrix("05.00");
        $plat14->setImage('salad1.png');
        $plat14->setActive(1);
        $plat14->setSlug($this->slugger->slug($plat14->getLibelle())->lower());
        $plat14->setCategorie($this->getReference('categorie'. 5));

        $plat15= new Plat();
        $plat15->setLibelle("Spaghetti Legumes");
        $plat15->setDescription("Spaghetti Legumes sans viande");
        $plat15->setPrix("30.00");
        $plat15->setImage('spaghetti-legumes.jpg');
        $plat15->setActive(1);
        $plat15->setSlug($this->slugger->slug($plat15->getLibelle())->lower());
        $plat15->setCategorie($this->getReference('categorie'. 7)); 


        $plat16= new Plat();
        $plat16->setLibelle("Tagliatelles saumon");
        $plat16->setDescription("Tagliatelles saumon et la c'est vraiment du saumon");
        $plat16->setPrix("20.00");
        $plat16->setImage('tagliatelles-saumon.webp');
        $plat16->setActive(1);
        $plat16->setSlug($this->slugger->slug($plat16->getLibelle())->lower());
        $plat16->setCategorie($this->getReference('categorie'. 7)); 





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