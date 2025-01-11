<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use NorthernBytes\AocHelper\Puzzle;

class Day4Part1 extends Puzzle
{
    protected string $puzzleName = 'Scratchcards';

    protected string $puzzleAnswerDescription = 'Points in total';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

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
            $this->debug("Card {$card_number} has " . count($winning_numbers_held) . " winning numbers and is worth {$points} points.");
            $points_total += $points;
        }
        $this->debug('');

        $this->setPuzzleAnswer((string)$points_total);

        return $this;
    }
}
