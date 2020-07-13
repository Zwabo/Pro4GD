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

        $category4 = new Category();
        $category4->setTitle('Kräuter');
        $category4->setParent($category3);
        $category4->setCreated($dateAdded);
        $category4->setUpdated($dateAdded);
        $manager->persist($category4);
        $manager->flush();

        $category5 = new Category();
        $category5->setTitle('Palmen');
        $category5->setParent($category3);
        $category5->setCreated($dateAdded);
        $category5->setUpdated($dateAdded);
        $manager->persist($category5);
        $manager->flush();

        $category6 = new Category();
        $category6->setTitle('Kletterpflanzen');
        $category6->setParent($category3);
        $category6->setCreated($dateAdded);
        $category6->setUpdated($dateAdded);
        $manager->persist($category6);
        $manager->flush();

        $category7 = new Category();
        $category7->setTitle('Zuchtpflanzen');
        $category7->setParent($category3);
        $category7->setCreated($dateAdded);
        $category7->setUpdated($dateAdded);
        $manager->persist($category7);
        $manager->flush();
    }
}