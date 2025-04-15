<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day16Part2 extends Puzzle
{
    protected string $puzzleName = 'Flawed Frequency Transmission';

    protected string $puzzleAnswerDescription = 'The eight-digit message embedded in the final output list';

    public function solve(): Puzzle
    {
        $input = str_split(str_repeat($this->getPuzzleInput(), 10000));
        $elements = count($input);
        $this->info("Input has {$elements} elements");
        $this->info("");

        $messageOffset = substr($this->getPuzzleInput(), 0, 7);
        $this->info("Message offset is {$messageOffset}");
        $this->info("");

        if ($messageOffset < $elements / 2) {
            throw new \Exception("Target message is in the first half of the output. This method cannot be used.");
        }
        $this->info("Target message is in the later half of the output. This solution can be used.");
        $this->info("");

        $input = array_splice($input, (int)$messageOffset);
        $elements = count($input);
        $this->info("Input shortened to {$elements} elements");
        $this->info("");

        $phases = 100;
        $this->info("Applying {$phases} phases of hacky custom reverse engineering algorithm");
        for ($phase = 1; $phase <= $phases; $phase++) {
            $output = $input;
            $sum = 0;
            for ($i = $elements-1; $i >= 0; $i--) {
                // All digits in the second half of the output seem to follow this pattern
                $sum = ($sum + $input[$i]) % 10;
                $output[$i] = $sum;
            }

            $this->debug("After phase {$phase}: " . join($output));
            $input = $output;
        }
        $this->info("");

        $this->setPuzzleAnswer(join(array_splice($output, 0, 8)));
        return $this;
    }
}
