<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day9Part1 extends Puzzle
{
    protected string $puzzleName = 'Sensor Boost';

    protected string $puzzleAnswerDescription = 'What BOOST keycode does the BOOST program produce';

    public function solve(): Puzzle
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());
        $computer->addInput(1);

        $computer->run();

        $this->setPuzzleAnswer($computer->getOutputAsString());

        return $this;
    }
}
