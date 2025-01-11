<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day4Part1 extends Puzzle
{
    protected string $puzzleName = 'The Ideal Stocking Stuffer';

    protected string $puzzleAnswerDescription = 'The lowest number to produce a hash beginning with five zeroes';

    public function solve(): Puzzle
    {
        $i = 0;
        while (!str_starts_with(md5($this->getPuzzleInput() . $i), '00000')) $i++;

        $this->setPuzzleAnswer((string)$i);

        return $this;
    }
}
