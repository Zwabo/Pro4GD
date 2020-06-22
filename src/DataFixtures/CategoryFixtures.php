<?php

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY = 'category';

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $dateAdded = date_create('2019-05-19 12:30:03');
        $dateAdded->format('Y-m-d h.i.s');

        $category = new Category();
        $category->setTitle('Neuigkeiten');
        $category->setCreated($dateAdded);
        $category->setUpdated($dateAdded);
        $manager->persist($category);
        $manager->flush();
        $this->addReference(self::CATEGORY, $category);

        $category2 = new Category();
        $category2->setTitle('Pflegetipps');
        $category2->setCreated($dateAdded);
        $category2->setUpdated($dateAdded);
        $manager->persist($category2);
        $manager->flush();

        $category3 = new Category();
        $category3->setTitle('Pflanzen');
        $category3->setCreated($dateAdded);
        $category3->setUpdated($dateAdded);
        $manager->persist($category3);
        $manager->flush();
    }
}