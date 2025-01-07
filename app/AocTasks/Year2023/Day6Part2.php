<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day6Part2 extends AocTask
{
    protected $dayName = 'Wait For It';

    public function run(): AocTask
    {
        $input = $this->getInput();

        $input = preg_replace('/ /', '', $input);

        $pattern = <<<EOL
        Time:(?P<time>\d.*\d)
        Distance:(?P<distance>\d.*\d)
        EOL;

        preg_match_all('/'.$pattern.'/', $input, $matches);

        $time = (int)$matches['time'][0];
        $record_distance = (int)$matches['distance'][0];

        $win_scenario_count = 0;

        for ($charge_ms = 1; $charge_ms < $time; $charge_ms++) {
            echo "Calculating scenario {$charge_ms}/{$time} (" . round(($charge_ms/$time)*100, 1) . "% done)\n";
            $distance = ($time - $charge_ms) * $charge_ms;
            if ($distance > $record_distance) {
                $win_scenario_count++;
            }
        }
        echo "\n";

        $this->setResultDescription('Number of different ways to beat the record for the race');
        $this->setResult((string)$win_scenario_count);

        return $this;
    }
}
