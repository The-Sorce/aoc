<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part2 extends Puzzle
{
    protected string $puzzleName = 'Not Quite Lisp';

    protected string $puzzleAnswerDescription = 'What is the position of the character that causes Santa to first enter the basement';

    public function solve(): Puzzle
    {
        $inputArray = str_split($this->getPuzzleInput());

        $floor = 0;
        foreach ($inputArray as $i => $char) {
            $floor += ($char == '(') ? 1 : -1;
            if ($floor < 0) {
                $this->setPuzzleAnswer((string)($i + 1));
                break;
            }

        }

        return $this;
    }
}
