<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use NorthernBytes\AocHelper\Puzzle;

class Day2Part1 extends Puzzle
{
    protected string $puzzleName = 'Cube Conundrum';

    protected string $puzzleAnswerDescription = 'Sum of the IDs of all possible games';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $red_max = 12;
        $green_max = 13;
        $blue_max = 14;

        preg_match_all('/Game (\d+): (.*)/', $input, $matches);

        $possible_games_sum = 0;
        foreach ($matches[1] as $i => $game_number) {
            $sets = explode('; ', $matches[2][$i]);
            foreach ($sets as $set) {
                preg_match_all('/(\d+) (red|green|blue)/', $set, $subset_matches);
                foreach ($subset_matches[1] as $j => $no_color_cubes) {
                    if ($no_color_cubes > ${$subset_matches[2][$j].'_max'}) {
                        // impossible game, skip
                        $this->debug("Game {$game_number} is impossible.");
                        continue 3;
                    }
                }
            }
            $this->debug("Game {$game_number} is possible.");
            $possible_games_sum += $game_number;
        }
        $this->debug('');

        $this->setPuzzleAnswer((string)$possible_games_sum);

        return $this;
    }
}
