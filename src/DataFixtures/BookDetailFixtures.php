<?php

namespace App\DataFixtures;

use App\Entity\BookDetail;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BookDetailFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $book1 = $this->getReference('book1');
        $bookDetail1 = new BookDetail();
        $bookDetail1->setDescription('The Hobbit is a fantasy novel written by J.R.R. Tolkien. It follows the adventures of Bilbo Baggins, a hobbit who embarks on a quest to reclaim the Lonely Mountain and its treasure from the dragon Smaug.');

        $manager->persist($bookDetail1);

        $book2 = $this->getReference('book2');
        $bookDetail2 = new BookDetail();
        $bookDetail2->setDescription('The Lord of the Rings: The Fellowship of the Ring is the first volume of J.R.R. Tolkien\'s epic fantasy trilogy. It tells the story of Frodo Baggins, a hobbit who must destroy the One Ring to prevent the Dark Lord Sauron from regaining his full power.');

        $manager->persist($bookDetail2);

        $book3 = $this->getReference('book3');
        $bookDetail3 = new BookDetail();
        $bookDetail3->setDescription('Harry Potter and the Philosopher\'s Stone is the first book in J.K. Rowling\'s Harry Potter series. It introduces the young wizard Harry Potter and his journey through Hogwarts School of Witchcraft and Wizardry.');

        $manager->persist($bookDetail3);

        $book4 = $this->getReference('book4');
        $bookDetail4 = new BookDetail();
        $bookDetail4->setDescription('To Kill a Mockingbird is a novel by Harper Lee. It explores themes of racial injustice and the loss of innocence through the eyes of Scout Finch, a young girl growing up in the fictional town of Maycomb, Alabama.');

        $manager->persist($bookDetail4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BookFixtures::class,
        ];
    }
}

