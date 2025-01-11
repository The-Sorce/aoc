<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day3Part2 extends Puzzle
{
    protected string $puzzleName = 'Perfectly Spherical Houses in a Vacuum';

    protected string $puzzleAnswerDescription = 'Number of houses that receive at least one present';

    public function solve(): Puzzle
    {
        $inputArray = str_split($this->getPuzzleInput());

        $movesArray = [];
        for ($i = 0; $i < count($inputArray); $i++) {
            $movesArray[$i % 2][] = $inputArray[$i];
        }

        $visitedHouses = [];
        foreach ($movesArray as $moves) {
            $x = 0;
            $y = 0;
            $visitedHouses["{$x},{$y}"] = true;
            foreach ($moves as $move) {
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
        }

        $this->setPuzzleAnswer((string)count($visitedHouses));

        return $this;
    }
}
