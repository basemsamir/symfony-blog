<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoriesFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    }
}
