<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day16Part1 extends Puzzle
{
    protected string $puzzleName = 'Flawed Frequency Transmission';

    protected string $puzzleAnswerDescription = 'The first eight digits in the final output list';

    public function solve(): Puzzle
    {
        $input = str_split($this->getPuzzleInput());
        $this->info("Input has " . count($input) . " elements");
        $this->info("");

        $basePattern = [0, 1, 0, -1];
        $this->info("Generating repeating patterns for each element");
        $repeatingPatterns = [];
        for ($i = 1; $i <= count($input); $i++) {
            $pattern = [];

            // repeat each value in the pattern a number of times equal to the position in the output list
            foreach ($basePattern as $x) {
                for ($j = 1; $j <= $i; $j++) {
                    $pattern[] = $x;
                }
            }

            // skip the very first value exactly once
            $pattern[] = array_shift($pattern);

            $this->debug("Pattern for pos {$i} has " . count($pattern) . " elements");
            
            $repeatingPatterns[] = $pattern;
        }
        $this->info(" ");

        $phases = 100;
        $this->info("Applying {$phases} phases of FFT");
        for ($phase = 1; $phase <= $phases; $phase++) {
            $output = [];

            // Don't mind this, misunderstood original specs. This is a workaround.
            $patterns = $repeatingPatterns;

            for ($i = 0; $i < count($input); $i++) {
                $output[$i] = 0;
                for ($j = 0; $j < count($input); $j++) {
                    $multiplier = array_shift($patterns[$i]);
                    $patterns[$i][] = $multiplier;

                    //$this->debug("i = {$i}, j = {$j}, multiplier = {$multiplier}, input[i] = {$input[$j]}");

                    $output[$i] += $input[$j] * $multiplier;
                }
                // only the ones digit is kept
                $output[$i] = abs($output[$i] % 10);
            }

            $this->debug("After phase {$phase}: " . join($output));
            $input = $output;
        }
        $this->info("");

        $this->setPuzzleAnswer(join(array_splice($output, 0, 8)));
        return $this;
    }
}
