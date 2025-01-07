<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day4Part1 extends AocTask
{
    protected $dayName = 'Scratchcards';

    public function run(): AocTask
    {
        $input = $this->getInput();

        preg_match_all('/Card +(\d+): +(\d.*\d) \| +(\d.*\d)/', $input, $matches);

        $points_total = 0;
        foreach ($matches[1] as $i => $card_number) {
            $winning_numbers = explode(' ', str_replace('  ', ' ', $matches[2][$i]));
            $numbers_held = explode(' ', str_replace('  ', ' ', $matches[3][$i]));
            $winning_numbers_held = array_intersect($numbers_held, $winning_numbers);
            $points = count($winning_numbers_held);
            if ($points > 2) {
                $points = pow(2, $points-1);
            }
            echo "Card {$card_number} has " . count($winning_numbers_held) . " winning numbers and is worth {$points} points.\n";
            $points_total += $points;
        }
        echo "\n";

        $this->setResultDescription('Points in total');
        $this->setResult((string)$points_total);

        return $this;
    }
}
