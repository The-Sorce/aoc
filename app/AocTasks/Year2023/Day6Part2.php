<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use NorthernBytes\AocHelper\Puzzle;

class Day6Part2 extends Puzzle
{
    protected string $puzzleName = 'Wait For It';

    protected string $puzzleAnswerDescription = 'Number of different ways to beat the record for the race';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $input = preg_replace('/ /', '', $input);

        $pattern = <<<EOL
        Time:(?P<time>\d.*\d)
        Distance:(?P<distance>\d.*\d)
        EOL;

        preg_match_all('/'.$pattern.'/', $input, $matches);

        $time = (int)$matches['time'][0];
        $record_distance = (int)$matches['distance'][0];

        $win_scenario_count = 0;

        $this->line("Calculating scenarios...");
        $progressBar = $this->output->createProgressBar($time);
        $progressBar->start();
        for ($charge_ms = 1; $charge_ms < $time; $charge_ms++) {
            $distance = ($time - $charge_ms) * $charge_ms;
            if ($distance > $record_distance) {
                $win_scenario_count++;
            }
            $progressBar->advance();
        }
        $progressBar->finish();
        $this->line("\n");

        $this->setPuzzleAnswer((string)$win_scenario_count);

        return $this;
    }
}
