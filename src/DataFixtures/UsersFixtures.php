<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder,
    private SluggerInterface $slugger
    ){}
    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setEmail('admin@demo.fr')
            ->setNom('Diallo')
            ->setPrenom('Seydina')
            ->setAdresse('42 rue Phil Foden')
            ->setCp('60000')
            ->setVille('Beauvais')
            ->setTelephone('0746553210')
            ->setPassword(
                $this->passwordEncoder->hashPassword($admin, '0000')
            );
            $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        // Créer des users 
        $faker = Faker\Factory::create('fr_FR');

        for($usr =1; $usr <= 5; $usr++){
            $user = new Users();
            $user->setEmail($faker->email)
                ->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setAdresse($faker->streetAddress)
                ->setCp($faker->postcode)
                ->setVille($faker->city)
                ->setTelephone($faker->phoneNumber)
                ->setPassword(
                    $this->passwordEncoder->hashPassword($user, '1234')
                );
            $manager->persist($user);
        }

        $manager->flush();
    }
}
