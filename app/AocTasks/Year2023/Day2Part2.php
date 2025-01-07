<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day2Part2 extends AocTask
{
    protected $dayName = 'Cube Conundrum';

    public function run(): AocTask
    {
        $input = $this->getInput();

        preg_match_all('/Game (\d+): (.*)/', $input, $matches);

        $power_sum = 0;
        foreach ($matches[1] as $i => $game_number) {
            $sets = explode('; ', $matches[2][$i]);
            $red_min = 0;
            $green_min = 0;
            $blue_min = 0;
            foreach ($sets as $set) {
                preg_match_all('/(\d+) (red|green|blue)/', $set, $subset_matches);
                foreach ($subset_matches[1] as $j => $no_color_cubes) {
                    $color = $subset_matches[2][$j];
                    ${$color.'_min'} = max(${$color.'_min'}, $no_color_cubes);
                }
            }
            $power = $red_min * $green_min * $blue_min;
            echo "Game {$game_number} requires a minimum of {$red_min} red, {$green_min} green, {$blue_min} blue cubes. Power = {$power}\n";
            $power_sum += $power;
        }
        echo "\n";

        $this->setResultDescription('Sum of the power of the sets');
        $this->setResult((string)$power_sum);

        return $this;
    }
}
