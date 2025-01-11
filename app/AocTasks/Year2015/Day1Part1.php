<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part1 extends Puzzle
{
    protected string $puzzleName = 'Not Quite Lisp';

    protected string $puzzleAnswerDescription = 'To what floor do the instructions take Santa';

    public function solve(): Puzzle
    {
        $opening = substr_count($this->getPuzzleInput(), '(');
        $closing = substr_count($this->getPuzzleInput(), ')');

        $floor = $opening - $closing;

        $this->setPuzzleAnswer((string)$floor);

        return $this;
    }
}
