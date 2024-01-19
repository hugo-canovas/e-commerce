<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\Client;
use App\Entity\Produit;
use App\Entity\Vendeur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
           // on crée 4 auteurs avec noms et prénoms "aléatoires" en français

            for ($i = 0; $i < 4; $i++) {
                $Vendeur = new Vendeur();
                $Vendeur->setNom($faker->lastName);
                $Vendeur->setPrenom($faker->firstName);
                $Vendeur->setEmail($faker->email);
                $Vendeur->setPassword($faker->password);

                $manager->persist($Vendeur);
            }

            for ($i = 0; $i < 4; $i++) {
                $client = new Client();
                $client->setNom($faker->lastName);
                $client->setPrenom($faker->firstName);
                $client->setEmail($faker->email);
                $client->setPassword($faker->password);

                $manager->persist($client);
            }

            // for ($i = 0; $i < 4; $i++) {
            //     $produit = new Produit();
            //     $produit->setDesignation($faker->text);
            //     $produit->setPrix($faker->numberBetween(0, 20));
            //     $produit->setQuantite($faker->numberBetween(0,10));

            //     $manager->persist($produit);
            // }

        $manager->flush();
    }
}
