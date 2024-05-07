<?php

namespace App\Controller;
use App\Model\Book;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use Symfony\Component\HttpFoundation\JsonResponse;
    class ApiBookController extends AbstractController
    {
        /* private $books = [
            ['title' => 'Book 1', 'author' => 'Author 1'],
            ['title' => 'Book 2', 'author' => 'Author 2'],
            ['title' => 'Book 3', 'author' => 'Author 3'],
        ]; */

        private $books = [
            new Book('Book 1', 'Author 1'),
            new Book('Book 2', 'Author 2'),
            new Book('Book 3', 'Author 3'),
        ];

        #[Route('/api/books')]
        public function getCollection() : JsonResponse
        {
            return $this->json($this->books);
        }
    }
    //return new JsonResponse(json_encode($this->books));
//return new JsonResponse(json_encode($this->books));