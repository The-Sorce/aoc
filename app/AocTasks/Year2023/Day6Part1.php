<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use NorthernBytes\AocHelper\Puzzle;

class Day6Part1 extends Puzzle
{
    protected string $puzzleName = 'Wait For It';

    protected string $puzzleAnswerDescription = 'All win scenario numbers multiplied together';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $input = preg_replace('/ +/', ' ', $input);

        $pattern = <<<EOL
        Time: (?P<time>\d.*\d)
        Distance: (?P<distance>\d.*\d)
        EOL;

        preg_match_all('/'.$pattern.'/', $input, $matches);

        $times = explode(' ', $matches['time'][0]);
        $distances = explode(' ', $matches['distance'][0]);

        $races_count = count($times);

        $this->debug("Parsed {$races_count} races from input.\n");

        $product_win_scenario_counts = 1;
        for ($i = 0; $i < $races_count; $i++) {
            $this->debug("Calculating win conditions for race {$i}...");

            $time = $times[$i];
            $record_distance = $distances[$i];

            $win_scenario_count = 0;

            for ($charge_ms = 1; $charge_ms < $time; $charge_ms++) {
                $distance = ($time - $charge_ms) * $charge_ms;
                if ($distance > $record_distance) {
                    $win_scenario_count++;
                }
            }

            $this->debug("Found {$win_scenario_count} different ways to beat the record for race {$i}.\n");

            $product_win_scenario_counts *= $win_scenario_count;
        }

        $this->setPuzzleAnswer((string)$product_win_scenario_counts);

        return $this;
    }
}
