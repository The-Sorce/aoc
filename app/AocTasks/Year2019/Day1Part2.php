<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part2 extends Puzzle
{
    protected string $puzzleName = 'The Tyranny of the Rocket Equation';

    protected string $puzzleAnswerDescription = 'The sum of the fuel requirements';

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());

        $fuelSum = 0;
        foreach ($inputArray as $i) {
            while ($i > 0) {
                $fuel = floor($i / 3) - 2;
                if ($fuel > 0) {
                    $fuelSum += $fuel;
                }
                $i = $fuel;
            }
        }
        
        $this->setPuzzleAnswer((string)$fuelSum);

        return $this;
    }
}
