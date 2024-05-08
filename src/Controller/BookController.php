<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/books')]
class BookController extends AbstractController
{
    #[Route('/', methods: ['GET'], name: 'app_books_index')]
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->getCollection();

        return $this->render('books/index.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/{id<\d+>}', methods: ['GET'], name: 'app_books_show')]
    public function show(int $id, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->find($id);
        if (!$book) {
            throw $this->createNotFoundException("Book with id $id not found");
        }
        return $this->render('books/show.html.twig', [
            'book' => $book,
        ]);
    }

    #[Route('/create', methods: ['GET'], name: 'app_books_create')]
    public function create(): Response
    {
        return $this->render('books/create.html.twig');
    }


    #[Route('/store', methods: ['POST'], name: 'app_books_store')]
    public function store(BookRepository $bookRepository)
    {
        //return;
    }


    #[Route('/edit/{id<\d+>}', methods: ['GET'], name: 'app_books_edit')]
    public function edit(int $id, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->find($id);
        if (!$book) {
            throw $this->createNotFoundException("Book with id $id not found");
        }
        return $this->render('books/edit.html.twig', [
            'book' => $book,
        ]);
    }

    #[Route('/update/{id<\d+>}', methods: ['PUT'], name: 'app_books_update')]
    public function update(BookRepository $bookRepository)
    {
        //return;
    }



    #[Route('/delete/{id<\d+>}', methods: ['DELETE'], name: 'app_books_delete')]
    public function delete(int $id, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->find($id);
        if (!$book) {
            throw $this->createNotFoundException("Book with id $id not found");
        }
        return $this->render('books/delete.html.twig');
    }
}