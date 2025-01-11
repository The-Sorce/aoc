<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day5Part1 extends Puzzle
{
    protected string $puzzleName = "Doesn't He Have Intern-Elves For This?";

    protected string $puzzleAnswerDescription = 'The total number of nice strings';

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());
        $niceStrings = 0;

        foreach ($inputArray as $string) {
            if (strlen(preg_replace('/[^aeiou]/', '', $string)) < 3) continue;

            $doubleLetters = 0;
            for ($i = 1; $i < strlen($string); $i++) {
                if ((substr($string, $i-1, 1) == substr($string, $i, 1))) $doubleLetters++;
            }
            if ($doubleLetters == 0) continue;

            if (preg_match('/ab|cd|pq|xy/', $string)) continue;

            $niceStrings++;
        }

        $this->setPuzzleAnswer((string)$niceStrings);

        return $this;
    }
}
