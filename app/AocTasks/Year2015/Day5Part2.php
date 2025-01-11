<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day5Part2 extends Puzzle
{
    protected string $puzzleName = "Doesn't He Have Intern-Elves For This?";

    protected string $puzzleAnswerDescription = 'The total number of nice strings';

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());
        $niceStrings = 0;

        foreach ($inputArray as $string) {
            $recurringTwoLetterStrings = 0;
            for ($i = 2; $i < strlen($string); $i++) {
                if (substr_count($string, substr($string, $i-2, 2)) > 1) $recurringTwoLetterStrings++;
            }
            if ($recurringTwoLetterStrings == 0) continue;

            $repeatingLetters = 0;
            for ($i = 2; $i < strlen($string); $i++) {
                if ((substr($string, $i-2, 1) == substr($string, $i, 1))) $repeatingLetters++;
            }
            if ($repeatingLetters == 0) continue;

            $niceStrings++;
        }

        $this->setPuzzleAnswer((string)$niceStrings);

        return $this;
    }
}
