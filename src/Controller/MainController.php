<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /* #[Route('/')]
    public function homepage(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();
        dd($books);
        return $this->render('main/homepage.html.twig', [
            'books' => $books,
        ]);
    } */

    /* #[Route('/')]
    public function homepage(): Response
    {
        $repository = $this->em->getRepository(Book::class);
        dump($repository);
        $books = $repository->findAll();
        dd($books);
        return $this->render('main/homepage.html.twig', [
            'books' => $books,
        ]);
    } */

    public function __construct(
        private EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    #[Route('/')]
    public function homepage(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Book::class);
        dump($repository);
        $books = $repository->findAll();
        dd($books);
        return $this->render('main/homepage.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/book/{id<\d+>}', name: 'book_detail')]
    public function bookDetail(int $id, BookRepository $bookRepository): Response
    {
        $book = $bookRepository->find($id);
        if (!$book) {
            throw $this->createNotFoundException("Book with id $id not found");
        }
        dd($book);
    }
}

