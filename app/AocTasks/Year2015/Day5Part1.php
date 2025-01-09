<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use App\AocTasks\AocTask;

class Day5Part1 extends AocTask
{
    protected $dayName = "Doesn't He Have Intern-Elves For This?";

    public function run(): AocTask
    {
        $inputArray = explode("\n", $this->getInput());
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

        $this->setResultDescription('The total number of nice strings');
        $this->setResult((string)$niceStrings);

        return $this;
    }
}
