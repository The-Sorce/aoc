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
        $elements = count($input);
        $this->info("Input has {$elements} elements");
        $this->info("");

        $phases = 100;
        $this->info("Applying {$phases} phases of FFT");
        for ($phase = 1; $phase <= $phases; $phase++) {
            $output = [];
            for ($i = 0; $i < $elements; $i++) {
                $output[$i] = 0;

                foreach (array_chunk(array_slice($input, $i), $i+1) as $j => $chunk) {
                    switch ($j % 4) {
                    case 0:
                        $output[$i] += array_sum($chunk);
                        break;
                    case 2:
                        $output[$i] -= array_sum($chunk);
                        break;
                    }
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
