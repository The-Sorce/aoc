<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\Grid;
use App\AocTasks\HelperClasses\MultiarrayFunctions;
use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day15Part2 extends Puzzle
{
    protected string $puzzleName = 'Oxygen System';

    protected string $puzzleAnswerDescription = 'How many minutes will it take to fill the area with oxygen';

    public function solve(): Puzzle
    {
        // Use part 1 to get the grid
        $part1 = new Day15Part1();
        $part1->setPuzzleInput($this->getPuzzleInput())->solve();
        $grid = $part1->grid;

        // Some easy find-and-replace to get a good starting grid
        $oxygenCell = $grid->findCells('X')[0];
        $grid->setCell($oxygenCell['x'], $oxygenCell['y'], 'O');
        $startCell = $grid->findCells('S')[0];
        $grid->setCell($startCell['x'], $startCell['y'], '.');

        $minutes = 0;

        while (count($grid->findCells('.')) > 0) {
            $oxygenCells = $grid->findCells('O');
            foreach ($oxygenCells as $oxygenCell) {
                $grid->setPos($oxygenCell['x'], $oxygenCell['y']);
                $targetCells = $grid->findInAdjacentCells('.');
                foreach ($targetCells as $targetCell) {
                    $grid->setCell($targetCell['x'], $targetCell['y'], 'O');
                }
            }
            $minutes++;

            echo MultiarrayFunctions::multiarray_to_text($grid->getGrid());
            echo "\n";
            //usleep(10000);
        }

        $this->setPuzzleAnswer((string)$minutes);

        return $this;
    }
}
