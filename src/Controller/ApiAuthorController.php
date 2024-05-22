<?php

namespace App\Controller;

use App\Model\Author;
use App\Repository\AuthorRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/authors')]
class ApiAuthorController extends AbstractController
{

    #[Route('/', methods: ['GET'], name: 'app_authors_get_authors')]
    public function getAuthors(AuthorRepository $authorRepository): JsonResponse
    {
        $authors = $authorRepository->findAll();
        $serializedAuthors = [];
        foreach ($authors as $author) {
            $books = [];
            
            foreach ($author->getBooks() as $book) {
                $books[] = [
                    'id' => $book->getId(),
                    'title' => $book->getTitle(),
                    'publishYear' => $book->getPublishYear(),
                ];
            }
            $serializedAuthors[] = [
                'id' => $author->getId(),
                'name' => $author->getName(),
                'books' => $books,
            ];
        }
        return $this->json($serializedAuthors);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function getAuthor(int $id, AuthorRepository $authorRepository): Response
    {
        $author = $authorRepository->find($id);
        if (!$author) {
            throw $this->createNotFoundException("Author with id $id not found");
        }
        return $this->json($author);
    }

    #[Route('', methods: ['POST'])]
    public function createAuthor(): JsonResponse
    {
        return $this->json(['message' => 'Author created'], 201);
    }

    #[Route('/{id<\d+>}', methods: ['PUT'])]
    public function updateAuthor(int $id): JsonResponse
    {
        return $this->json(['message' => 'Author updated'], 200);
    }

}