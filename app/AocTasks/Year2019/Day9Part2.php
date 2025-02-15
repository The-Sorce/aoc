<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day9Part2 extends Puzzle
{
    protected string $puzzleName = 'Sensor Boost';

    protected string $puzzleAnswerDescription = 'The coordinates of the distress signal';

    public function solve(): Puzzle
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());
        $computer->addInput(2);

        $computer->run();

        $this->setPuzzleAnswer($computer->getOutputAsString());

        return $this;
    }
}
