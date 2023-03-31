<?php

declare(strict_types=1);

namespace App;

class Rental {
    private Movie $movie;
    private int $daysRented;

    public function __construct(Movie $movie, int $daysRented) {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int {
        return $this->daysRented;
    }

    public function getMovie(): Movie {
        return $this->movie;
    }
}