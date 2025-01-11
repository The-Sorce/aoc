<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day2Part1 extends Puzzle
{
    protected string $puzzleName = 'I Was Told There Would Be No Math';

    protected string $puzzleAnswerDescription = 'Total square feet of wrapping paper required';

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());

        $sum = 0;
        foreach ($inputArray as $row) {
            $dimensions = explode('x', $row);

            $l = $dimensions[0];
            $w = $dimensions[1];
            $h = $dimensions[2];

            $surfaceArea = 2*$l*$w + 2*$w*$h + 2*$h*$l;
            $slack = min([$l*$w, $w*$h,$h*$l]);
            $sum += $surfaceArea + $slack;
        }

        $this->setPuzzleAnswer((string)$sum);

        return $this;
    }
}
