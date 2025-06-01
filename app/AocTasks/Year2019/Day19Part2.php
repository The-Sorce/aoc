<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;


class Day19Part2 extends Puzzle
{
    protected string $puzzleName = 'Tractor Beam';

    protected string $puzzleAnswerDescription = "First position where Santa's ship can fit";

    public function solve(): Puzzle
    {
        $x = 0;
        $y = 1000;

        do {
            $y++;
            $x = $this->findLeftEdge($x, $y);

            $candidateX = $x + 99;
            $candidateY = $y - 99;
        } while (!$this->positionAffected($candidateX, $candidateY));

        $y -= 99;
        $result = $x * 10000 + $y;
       
        $this->setPuzzleAnswer((string)$result);

        return $this;
    }

    private function positionAffected(int $x, int $y): bool
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());
        $computer->addInput($x);
        $computer->addInput($y);
        $computer->run();

        return ($computer->getNextOutput() === 1);
    }

    private function findLeftEdge(int $startingX = 0, int $y): int
    {
        $x = $startingX;
        while (!$this->positionAffected($x, $y)) $x++;

        return $x;
    }
}
