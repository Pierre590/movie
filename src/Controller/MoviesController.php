<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class MoviesController extends AbstractController
{
    const LIMIT = 21;

    /**
     * @Route("/movies", name="movies")
     */
    public function index(Request $request)
    {
        return $this->render('movies/index.html.twig', [
            'limit' => self::LIMIT,
        ]);
    }

    /**
     * @Route("/movies/ajax", name="movies_ajax")
     */
    public function moviesAjax(Request $request)
    {
        $search = (string) $request->query->get('search', null);
        $offset = (int) $request->query->get('offset', 0);

        $movies = $this->getDoctrine()
        ->getRepository(Movies::class)
        ->createQueryBuilder('m')
        ->where('m.name LIKE :name')
        ->setParameter('name', '%' . $search .'%')
        ->setMaxResults(self::LIMIT)
        ->setFirstResult($offset)
        ->orderBy('m.name')
        ->getQuery()
        ->execute();

        return $this->render('movies/ajax.html.twig', [
            'movies' => $movies,
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
