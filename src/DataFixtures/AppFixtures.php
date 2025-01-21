<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Ingredient;
use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 80; $i++) {
            $ingredient = new Ingredient();
            $ingredient->setName($this->faker->word())
                ->setPrice(mt_rand(1, 100));

            $manager->persist($ingredient);
        }

        for ($i = 1; $i <= 5; $i++) {
            $bool = (bool) random_int(0, 1);
            $recette = new Recette();
            $recette->setName($this->faker->text(50))
                ->setTime(mt_rand(1, 1440))
                ->setPeopleNb(mt_rand(1, 50))
                ->setDifficulty(mt_rand(1, 5))
                ->setDescription($this->faker->text(200))
                ->setPrice(mt_rand(1, 1000))
                ->setFavorite($bool);
            $manager->persist($recette);
        }

        $manager->flush();
    }
}
