<?php
declare(strict_types=1);

namespace App\AocTasks\Year2024;

use NorthernBytes\AocHelper\Puzzle;

class Day2Part1 extends Puzzle
{
    protected string $puzzleName = 'Red-Nosed Reports';

    protected string $puzzleAnswerDescription = 'The number of safe reports';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $safe_reports = 0;
        foreach (explode("\n", $input) as $report) {
            $this->debug("Report: {$report}");
            $levels = explode(" ", $report);

            $sorted = $levels;
            sort($sorted);
            $rsorted = $levels;
            rsort($rsorted);

            if (($levels != $sorted) && ($levels != $rsorted)) {
                // not all increasing or all decreasing
                // => unsafe, skip
                $this->debug("Not all increasing or all decreasing, unsafe\n");
                continue;
            }

            for ($i = 1; $i<count($levels); $i++) {
                $change = abs($levels[$i-1]-$levels[$i]);
                $this->debug("{$levels[$i-1]} {$levels[$i]} is an increase/decrease of {$change}");
                if (($change < 1) || ($change > 3)) {
                    // Too small or large increase/decrease
                    // => unsafe, skip
                    $this->debug("=> unsafe\n");
                    continue 2;
                }
            }
            $this->debug("=> safe\n");
            $safe_reports++;

        }

        $this->setPuzzleAnswer((string)$safe_reports);

        return $this;
    }
}
