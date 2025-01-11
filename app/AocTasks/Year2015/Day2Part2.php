<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day2Part2 extends Puzzle
{
    protected string $puzzleName = 'I Was Told There Would Be No Math';

    protected string $puzzleAnswerDescription = 'Total feet of ribbon required';

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());

        $sum = 0;
        foreach ($inputArray as $row) {
            $dimensions = explode('x', $row);

            $bowLength = array_product($dimensions);

            sort($dimensions);
            array_pop($dimensions);
            $ribbonLength = array_sum($dimensions) * 2;

            $sum += $bowLength + $ribbonLength;
        }

        $this->setPuzzleAnswer((string)$sum);

        return $this;
    }
}
