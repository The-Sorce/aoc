<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day2Part1 extends AocTask
{
    protected $dayName = 'Cube Conundrum';

    public function run(): AocTask
    {
        $input = $this->getInput();

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
                        echo "Game {$game_number} is impossible.\n";
                        continue 3;
                    }
                }
            }
            echo "Game {$game_number} is possible.\n";
            $possible_games_sum += $game_number;
        }
        echo "\n";

        $this->setResultDescription('Sum of the IDs of all possible games');
        $this->setResult((string)$possible_games_sum);

        return $this;
    }
}
