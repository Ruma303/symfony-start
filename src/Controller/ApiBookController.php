<?php

namespace App\Controller;

use App\Model\Book;
use App\Repository\BookRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/books')]
class ApiBookController extends AbstractController
{
    /* private $books = [
        ['title' => 'Book 1', 'author' => 'Author 1'],
        ['title' => 'Book 2', 'author' => 'Author 2'],
        ['title' => 'Book 3', 'author' => 'Author 3'],
    ]; */

    /* private $books = [
        new Book('Book 1', 'Author 1'),
        new Book('Book 2', 'Author 2'),
        new Book('Book 3', 'Author 3'),
    ]; */

    #[Route('/api/books')]
    public function getCollection(BookRepository $bookRepository): JsonResponse
    {
        $books = $bookRepository->getCollection();
        return $this->json($books);
    }

    //dd($bookRepository);
    //$logger->info('Book collection retrieved');
    /* $books = [
        new Book('Book 1', 'Author 1'),
        new Book('Book 2', 'Author 2'),
        new Book('Book 3', 'Author 3'),
    ]; */
    //return new JsonResponse(json_encode($this->books));
    //return new JsonResponse(json_encode($this->books));

    #[Route('/', methods: ['GET'], name: 'app_books_get_books')]
    public function getBooks(BookRepository $bookRepository): JsonResponse
    {
        $books = $bookRepository->getCollection();
        return $this->json($books);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function getBook(int $id, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->find($id);
        if (!$book) {
            throw $this->createNotFoundException("Book with id $id not found");
        }
        return $this->json($book);
    }

    #[Route('', methods: ['POST'])]
    public function createBook(): JsonResponse
    {
        return $this->json(['message' => 'Book created'], 201);
    }

    #[Route('/{id<\d+>}', methods: ['PUT'])]
    public function updateBook(int $id): JsonResponse
    {
        return $this->json(['message' => 'Book updated'], 200);
    }

}