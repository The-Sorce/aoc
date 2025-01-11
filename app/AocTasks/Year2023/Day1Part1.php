<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part1 extends Puzzle
{
    protected string $puzzleName = 'Trebuchet?!';

    protected string $puzzleAnswerDescription = 'Sum of calibration values';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        preg_match_all('/(\d).*/', $input, $first_no_matches);
        preg_match_all('/.*(\d)/', $input, $last_no_matches);

        $sum = 0;
        for ($i = 0; $i < count($first_no_matches[1]); $i++) {
            $sum += (int)"{$first_no_matches[1][$i]}{$last_no_matches[1][$i]}";
        }

        $this->setPuzzleAnswer((string)$sum);

        return $this;
    }
}
