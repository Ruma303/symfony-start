<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle('The Hobbit');
        $book->setAuthor((string) $this->getReference('actor1'));
        $book->setPublishYear(1937);
        $manager->persist($book);

        $book2 = new Book();
        $book2->setTitle('The Lord of the Rings: The Fellowship of the Ring');
        $book2->setAuthor((string) $this->getReference('actor1'));
        $book2->setPublishYear(1954);
        $manager->persist($book2);

        $manager->flush();
    }
}

