<?php

namespace App\Tests;

use App\Entity\Movies;

class MoviesTest extends \Codeception\Test\Unit
{
    /**
     * @var \App\Tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetMovieFeature()
    {
        $this->tester->seeInRepository(Movies::class, [
            'name' => 'Blood diamond'
        ]);

    }

    public function testAddMovieFeature()
    {
        $movie = new Movies;
        $movie->setName('underwater');
        $movie->setDate(new \DateTime('2014-10-01'));

        $em-> = $this->gestModule('Doctrine2')->em;
        $em->persist($movie);
        $em->flush();

        $this->assertEquals(
            'underwater',
            $movie->getName()
        );

        $this->tester->seeInRepository(Movies::class, [
            'name' => 'underwater'
        ]);

    }
}
