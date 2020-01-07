<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class MoviesController extends AbstractController
{

    /**
     * @Route("/movies", name="movies")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $movies = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->createQueryBuilder('m')
        ->where('m.name LIKE :name')
        ->setParameter('name', '%%')
        ->orderBy('m.name')
        ->getQuery()
        ->execute();

        $list = $paginator->paginate(
            $movies,
            $request->query->getInt('page', 1),
            24
        );

        return $this->render('movies/index.html.twig', [
            'list' => $list,
        ]);
    }

    /**
     * @Route("/movie/{id}", name="movie")
     */
    public function movie($id)
    {
        $movie = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->find($id);

        dump($movie);
        return $this->render('movies/movie.html.twig', [
            'movie' => $movie,
        ]);
    }



}
