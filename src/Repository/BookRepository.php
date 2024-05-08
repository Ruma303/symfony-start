<?php

namespace App\Repository;
use App\Model\Book;
use Psr\Log\LoggerInterface;

class BookRepository
{
    public function __construct(private LoggerInterface $logger)
    {

    }

    public function getCollection() : array
    {
        $this->logger->info('Book collection retrieved');
        return [
            new Book(1, 'Book 1', 'Author 1'),
            new Book(2, 'Book 2', 'Author 2'),
            new Book(3, 'Book 3', 'Author 3'),
        ];
    }

    public function find(int $id) : ?Book
    {
        foreach ($this->getCollection() as $book) {
            if ($book->getId() === $id) {
                return $book;
            }
        }
        return null;
    }
}


