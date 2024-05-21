<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $author1 = new Author();
        $author1->setName('J.R.R. Tolkien');
        $manager->persist($author1);

        $author2 = new Author();
        $author2->setName('Jane Austen');
        $manager->persist($author2);

        $author3 = new Author();
        $author3->setName('Charles Dickens');
        $manager->persist($author3);

        $author4 = new Author();
        $author4->setName('Leo Tolstoy');
        $manager->persist($author4);

        $manager->flush();

        $this->addReference('author1', $author1);
        $this->addReference('author2', $author2);
        $this->addReference('author3', $author3);
        $this->addReference('author4', $author4);

    }
}