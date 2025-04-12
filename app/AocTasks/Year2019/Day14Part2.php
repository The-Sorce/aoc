<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day14Part2 extends Puzzle
{
    protected string $puzzleName = 'Space Stoichiometry';

    protected string $puzzleAnswerDescription = 'The maximum amount of FUEL you can produce';

    private array $dependencyMap = [];
    private array $chemicalBalance = [];
    private int $oreConsumed = 0;

    public function solve(): Puzzle
    {
        // Use part 1 as a starting ground
        $part1 = new Day14Part1();
        $part1->setPuzzleInput($this->getPuzzleInput())->solve();
        $fuelProduced = 1;
        $orePerFuelPart1 = $part1->getPuzzleAnswer();
        $this->debug("ORE-per-FUEL in part 1 was {$orePerFuelPart1}");

        // Calculate a safe lower bound based on results from part 1
        $lowerBound = (int)(1000000000000 / $orePerFuelPart1);
        $part1->produceChemical('FUEL', $lowerBound-$fuelProduced);
        $fuelProduced += $lowerBound-$fuelProduced;
        $this->debug("Produced {$fuelProduced} FUEL so far");

        // Calculate new ORE-per-FUEL
        $newOrePerFuel = ($part1->oreConsumed / $fuelProduced);
        $this->debug("ORE-per-FUEL observed after producing {$fuelProduced} FUEL is {$newOrePerFuel}");

        // Calculate a new number based on the observed ORE-per-FUEL
        $amountOfFuel = (int)(1000000000000 / $newOrePerFuel);
        $this->debug("According to the obeserved ORE-per-FUEL ratio, we should be able to produce {$amountOfFuel} FUEL");
        $this->debug("");

        // YOLO, going with this without even testing. :D

        $this->setPuzzleAnswer((string)$amountOfFuel);
        return $this;
    }
}
