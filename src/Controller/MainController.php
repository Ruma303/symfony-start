<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/')]
    public function homepage(BookRepository $bookRepository) : Response
    {
        $books = $bookRepository->getCollection();

        return $this->render('main/homepage.html.twig', [
                'books' => $books,
        ]);
    }
}