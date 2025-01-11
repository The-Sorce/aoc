<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day3Part1 extends Puzzle
{
    protected string $puzzleName = 'Perfectly Spherical Houses in a Vacuum';

    protected string $puzzleAnswerDescription = 'Number of houses that receive at least one present';

    public function solve(): Puzzle
    {
        $inputArray = str_split($this->getPuzzleInput());

        $x = 0;
        $y = 0;
        $visitedHouses = [];
        $visitedHouses["{$x},{$y}"] = true;
        foreach ($inputArray as $move) {
            switch ($move) {
                case '^':
                    $y--;
                    break;
                case 'v':
                    $y++;
                    break;
                case '>':
                    $x++;
                    break;
                case '<':
                    $x--;
                    break;
            }
            $visitedHouses["{$x},{$y}"] = true;
        }

        $this->setPuzzleAnswer((string)count($visitedHouses));

        return $this;
    }
}
