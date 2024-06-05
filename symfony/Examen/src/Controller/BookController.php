<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class BookController extends AbstractController
{
    /**
     * @Route("/book", name="app_book")
     */
    // public function index(): Response
    // {
    //     return $this->render('book/index.html.twig', [
    //         'controller_name' => 'BookController',
    //     ]);
    // }

    /**
     * @Route("/books", name="app_book")
     */
    public function listeBooks()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $books = $entityManager->getRepository(Book::class)->findAll();

        return $this->render('book\index.html.twig', ['books' => $books]);
    }

    /**
     * @Route("/new", name="book_new")
     */
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $book = new Book();
    //     $form = $this->createForm(BookType::class, $book);

    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($book);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('book_new'); // Redirige après la soumission
    //     }

    //     return $this->render('book/new.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }

    /**
     * @Route("/new", name="book_new")
     */
    public function newBook(Request $request)
    {
        $book = new Book();

        $formBuilder = $this->get('form.factory')->createBuilder(BookType::class, $book);

        // $formBuilder->add('save', SubmitType::class);
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {

                $book = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($book);
                $entityManager->flush();
            }
        }

        return $this->render('book/new.html.twig', [
            'form' => $form->createView(),
            // 'book' => $book,
        ]);
    }

    /**
     * @Route("show/{id}", name="book_show")
     */
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', [
            'book' => $book,
        ]);
    }
}
