<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day2Part2 extends Puzzle
{
    protected string $puzzleName = '1202 Program Alarm';

    protected string $puzzleAnswerDescription = '100 * noun + verb';

    public function solve(): Puzzle
    {
        $expectedOutput = 19690720;

        $computer = new IntcodeComputer();

        for ($noun = 0; $noun <= 99; $noun++) {
            for ($verb = 0; $verb <= 99; $verb++) {
                $computer->setMemory($this->getPuzzleInput());
                $computer->setMemoryPos(1, $noun);
                $computer->setMemoryPos(2, $verb);
                $computer->run();
                if ($computer->getMemoryPos(0) === $expectedOutput) {
                    $this->setPuzzleAnswer((string)(100 * $noun + $verb));
                    break 2;
                }
            }
        }

        return $this;
    }
}
