<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\AuthorsType;
use App\Entity\Authors;


class AuthorsController extends AbstractController
{
    /**
     * @Route("/authors", name="admin_authors_add")
     */
     public function add(Request $request)
    {
        $authors = new Authors;
        $form = $this->createForm(AuthorsType::class, $authors);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $authors = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($authors);
            $entityManager->flush();

            // redirects to the "movies" route
            return $this->redirectToRoute('movies');
        }



        return $this->render('admin/authors/aut.html.twig',[
            'form' => $form->createView(),

        ]);
    }

}
