<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day12Part1 extends Puzzle
{
    protected string $puzzleName = 'JSAbacusFramework.io';

    protected string $puzzleAnswerDescription = 'The sum of all numbers in the document';

    public function solve(): Puzzle
    {
        preg_match_all('/-?[0-9]+/', $this->getPuzzleInput(), $matches);

        $this->setPuzzleAnswer((string)array_sum($matches[0]));

        return $this;
    }
}
