<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class AppFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        // use the factory to create a Faker\Generator instance
        $faker = Faker\Factory::create('fr_FR');

        for($prod = 1; $prod <= 10; $prod++){
            $product = new Product();
            $product->setName($faker->text(15));
           
            $product->setPrice($faker->numberBetween(900, 150000));
            ;

            //On va chercher une référence de catégorie
            $manager->persist($product);
        }

        $manager->flush();
    }
}