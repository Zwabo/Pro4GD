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

        $category8 = new Category();
        $category8->setTitle('Wildpflanze');
        $category8->setParent($category3);
        $category8->setCreated($dateAdded);
        $category8->setUpdated($dateAdded);
        $manager->persist($category8);
        $manager->flush();

        $category9 = new Category();
        $category9->setTitle('Heilpflanze');
        $category9->setParent($category3);
        $category9->setCreated($dateAdded);
        $category9->setUpdated($dateAdded);
        $manager->persist($category9);
        $manager->flush();

        $category10 = new Category();
        $category10->setTitle('Fleischfressende Pflanze');
        $category10->setParent($category3);
        $category10->setCreated($dateAdded);
        $category10->setUpdated($dateAdded);
        $manager->persist($category10);
        $manager->flush();

        $category11 = new Category();
        $category11->setTitle('Zimmerpflanze');
        $category11->setParent($category3);
        $category11->setCreated($dateAdded);
        $category11->setUpdated($dateAdded);
        $manager->persist($category11);
        $manager->flush();

        $category12 = new Category();
        $category12->setTitle('Sonnenpflanze');
        $category12->setParent($category3);
        $category12->setCreated($dateAdded);
        $category12->setUpdated($dateAdded);
        $manager->persist($category12);
        $manager->flush();

        $category13 = new Category();
        $category13->setTitle('Frühlingsblüher');
        $category13->setParent($category3);
        $category13->setCreated($dateAdded);
        $category13->setUpdated($dateAdded);
        $manager->persist($category13);
        $manager->flush();

        $category14 = new Category();
        $category14->setTitle('Sommerblüher');
        $category14->setParent($category3);
        $category14->setCreated($dateAdded);
        $category14->setUpdated($dateAdded);
        $manager->persist($category14);
        $manager->flush();

        $category15 = new Category();
        $category15->setTitle('Herbstblüher');
        $category15->setParent($category3);
        $category15->setCreated($dateAdded);
        $category15->setUpdated($dateAdded);
        $manager->persist($category15);
        $manager->flush();

        $category16 = new Category();
        $category16->setTitle('Winterblüher');
        $category16->setParent($category3);
        $category16->setCreated($dateAdded);
        $category16->setUpdated($dateAdded);
        $manager->persist($category16);
        $manager->flush();
    }
}