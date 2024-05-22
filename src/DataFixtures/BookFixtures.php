<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $author1 = $this->getReference('author1');
        $book1 = new Book();
        $book1->setTitle('The Hobbit');
        $book1->setAuthor($author1);
        $book1->setPublishYear(1937);
        $manager->persist($book1);
        $this->addReference('book1', $book1);

        $author2 = $this->getReference('author2');
        $book2 = new Book();
        $book2->setTitle('The Lord of the Rings: The Fellowship of the Ring');
        $book2->setAuthor($author2);
        $book2->setPublishYear(1954);
        $manager->persist($book2);
        $this->addReference('book2', $book2);

        $author3 = $this->getReference('author3');
        $book3 = new Book();
        $book3->setTitle('Harry Potter and the Philosopher\'s Stone');
        $book3->setAuthor($author3);
        $book3->setPublishYear(1997);
        $manager->persist($book3);
        $this->addReference('book3', $book3);

        $author4 = $this->getReference('author4');
        $book4 = new Book();
        $book4->setTitle('To Kill a Mockingbird');
        $book4->setAuthor($author4);
        $book4->setPublishYear(1960);
        $manager->persist($book4);
        $this->addReference('book4', $book4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AuthorFixtures::class,
        ];
    }
}

