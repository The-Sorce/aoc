<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day5Part1 extends Puzzle
{
    protected string $puzzleName = 'Sunny with a Chance of Asteroids';

    protected string $puzzleAnswerDescription = 'What diagnostic code does the program produce';

    public function solve(): Puzzle
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());
        $computer->addInput(1);

        $computer->run();

        $outputArray = $computer->getOutputAsArray();
        $this->setPuzzleAnswer((string)end($outputArray));

        return $this;
    }
}
