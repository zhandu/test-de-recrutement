<?php

declare(strict_types=1);

namespace App;

class Customer {
    private string $name;
    private array $rentals = [];

    public function __construct(String $name) {
        $this->name = $name;
    }

    public function addRental(Rental $rental) {
        return $this->rentals[] = $rental;
    }

    public function getName(): string {
        return $this->name;
    }

    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        foreach ($this->rentals as $rental) {
           $thisAmount = 0.0;

           /* @var $rental Rental */
           // determines the amount for each line
           switch ($rental->getMovie()->getPriceCode()) {
               case Movie::REGULAR:
                   $thisAmount += 2;
                   if ($rental->getDaysRented() > 2)
                       $thisAmount += ($rental->getDaysRented() - 2) * 1.5;
                   break;
               case Movie::NEW_RELEASE:
                   $thisAmount += $rental->getDaysRented() * 3;
                   break;
               case Movie::CHILDREN:
                   $thisAmount += 1.5;
                   if ($rental->getDaysRented() > 3) {
                       $thisAmount += ($rental->getDaysRented() - 3) * 1.5;
                   }
                   break;
           }

           $frequentRenterPoints++;

           if ($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE
                && $rental->getDaysRented() > 1)
               $frequentRenterPoints++;

            $result .= "\t" . $rental->getMovie()->getTitle() . "\t"
                . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;

        }

        $result .= "You owed " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }
}