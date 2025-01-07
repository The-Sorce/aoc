<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day6Part1 extends AocTask
{
    protected $dayName = 'Wait For It';

    public function run(): AocTask
    {
        $input = $this->getInput();

        $input = preg_replace('/ +/', ' ', $input);

        $pattern = <<<EOL
        Time: (?P<time>\d.*\d)
        Distance: (?P<distance>\d.*\d)
        EOL;

        preg_match_all('/'.$pattern.'/', $input, $matches);

        $times = explode(' ', $matches['time'][0]);
        $distances = explode(' ', $matches['distance'][0]);

        $races_count = count($times);

        echo "Parsed {$races_count} races from input.\n\n";

        $product_win_scenario_counts = 1;
        for ($i = 0; $i < $races_count; $i++) {
            echo "Calculating win conditions for race {$i}...\n";

            $time = $times[$i];
            $record_distance = $distances[$i];

            $win_scenario_count = 0;

            for ($charge_ms = 1; $charge_ms < $time; $charge_ms++) {
                $distance = ($time - $charge_ms) * $charge_ms;
                if ($distance > $record_distance) {
                    $win_scenario_count++;
                }
            }

            echo "Found {$win_scenario_count} different ways to beat the record for race {$i}.\n\n";

            $product_win_scenario_counts *= $win_scenario_count;
        }

        $this->setResultDescription('All win scenario numbers multiplied together');
        $this->setResult((string)$product_win_scenario_counts);

        return $this;
    }
}
