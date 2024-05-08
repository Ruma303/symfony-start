<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/books')]
class BookController extends AbstractController
{
    #[Route('/', methods: ['GET'], name: 'books')]
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->getCollection();

        return $this->render('books/books.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/{id<\d+>}', methods: ['GET'], name: 'book')]
    public function show(int $id, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->find($id);
        if (!$book) {
            throw $this->createNotFoundException("Book with id $id not found");
        }
        return $this->render('books/book.html.twig', [
            'book' => $book,
        ]);
    }
}