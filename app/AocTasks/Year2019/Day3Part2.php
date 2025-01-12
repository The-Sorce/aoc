<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day3Part2 extends Puzzle
{
    protected string $puzzleName = 'Crossed Wires';

    protected string $puzzleAnswerDescription = 'The fewest combined steps to reach an intersection';

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());

        $breadcrumbs = [];
        foreach ($inputArray as $wire => $wireInstructions) {
            $x = 0;
            $y = 0;
            $steps = 0;
            $breadcrumbs[$wire] = [];
            $wireInstructionsArray = explode(',', $wireInstructions);
            foreach ($wireInstructionsArray as $instruction) {
                $direction = substr($instruction, 0, 1);
                $length = (int)substr($instruction, 1);
                for ($i = 1; $i <= $length; $i++) {
                    switch ($direction) {
                        case 'U':
                            $y--;
                            break;
                        case 'D':
                            $y++;
                            break;
                        case 'L':
                            $x--;
                            break;
                        case 'R':
                            $x++;
                            break;
                    }
                    $steps++;
                    if (!isset($breadcrumbs[$wire]["{$x},{$y}"])) {
                        $breadcrumbs[$wire]["{$x},{$y}"] = $steps;
                    }
                }
            }
        }

        $intersections = array_keys(array_intersect_key($breadcrumbs[0], $breadcrumbs[1]));
        $combinedSteps = [];
        foreach ($intersections as $intersection) {
            $combinedSteps[$intersection] = $breadcrumbs[0][$intersection] + $breadcrumbs[1][$intersection];
        }
        $minCombinedSteps = min($combinedSteps);

        $this->setPuzzleAnswer((string)$minCombinedSteps);

        return $this;
    }
}
