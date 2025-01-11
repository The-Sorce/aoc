<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part1 extends Puzzle
{
    protected string $puzzleName = 'The Tyranny of the Rocket Equation';

    protected string $puzzleAnswerDescription = 'The sum of the fuel requirements';

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());

        $fuel = 0;
        foreach ($inputArray as $i) {
            $fuel += floor($i / 3) - 2;
        }
        
        $this->setPuzzleAnswer((string)$fuel);

        return $this;
    }
}
