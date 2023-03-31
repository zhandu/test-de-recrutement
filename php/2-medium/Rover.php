<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    public function receive(string $commandsSequence): void
    {
        // remove the variable $commandsSequenceLength used in one place
        for ($i = 0; $i < strlen($commandsSequence); ++$i) {
            $command = substr($commandsSequence, $i, 1);
            // Use the in_array function (the $command variable is used only once now)
            if (in_array($command, ["l", "r"], true)) {
                // Rotate Rover
                // Use switch (more readable)
                switch ($this->direction) {
                    case "N": $this->direction = $command === "r" ? "E" : "W"; break;
                    case "S": $this->direction = $command === "r" ? "W" : "E"; break;
                    case "W": $this->direction = $command === "r" ? "N" : "S"; break;
                    default: $this->direction = $command === "r" ? "S" : "N"; break;
                }
            } else {
                // Displace Rover
                // Ternary conditional operator
                $displacement = $command === "f" ? 1 : -1;

                // Use switch (more readable)
                switch($this->direction) {
                    case "N": $this->y += $displacement; break;
                    case "S": $this->y -= $displacement; break;
                    case "W": $this->x -= $displacement; break;
                    default: $this->x += $displacement; break;
                }
            }
        }
    }
}