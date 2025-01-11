<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day2Part1 extends Puzzle
{
    protected string $puzzleName = '1202 Program Alarm';

    protected string $puzzleAnswerDescription = 'Value left at position 0';

    public function solve(): Puzzle
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());

        $computer->setMemoryPos(1, 12);
        $computer->setMemoryPos(2, 2);

        $computer->run();

        $this->setPuzzleAnswer((string)$computer->getMemoryPos(0));

        return $this;
    }
}
