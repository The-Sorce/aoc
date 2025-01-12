<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day3Part1 extends Puzzle
{
    protected string $puzzleName = 'Crossed Wires';

    protected string $puzzleAnswerDescription = 'The Manhattan distance to the closest intersection';

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());

        $breadcrumbs = [];
        foreach ($inputArray as $wire => $wireInstructions) {
            $x = 0;
            $y = 0;
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
                    $breadcrumbs[$wire]["{$x},{$y}"] = abs($x) + abs($y);
                }
            }
        }

        $commonBreadcrumbs = array_intersect_key($breadcrumbs[0], $breadcrumbs[1]);
        $minDistance = min($commonBreadcrumbs);

        $this->setPuzzleAnswer((string)$minDistance);

        return $this;
    }
}
