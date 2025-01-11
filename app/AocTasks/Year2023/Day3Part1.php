<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\HelperClasses\Grid;
use App\AocTasks\HelperClasses\MultiarrayFunctions;
use NorthernBytes\AocHelper\Puzzle;

class Day3Part1 extends Puzzle
{
    protected string $puzzleName = 'Gear Ratios';

    protected string $puzzleAnswerDescription = 'Sum of part numbers';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $input_array = MultiarrayFunctions::text_to_multiarray($input);

        $grid = new Grid();
        $grid->setGrid($input_array);

        $sum = 0;
        foreach ($grid->getGrid() as $y => $row) {
            $line = implode($row);
            preg_match_all('/(\d+)/', $line, $matches, PREG_OFFSET_CAPTURE);
            foreach ($matches[1] as $match) {
                $part_number = $match[0];
                $start_x = $match[1];
                $end_x = $start_x + strlen($part_number) - 1;
                echo "Number found: {$part_number} at x={$start_x}-{$end_x},y={$y}";

                for ($x = $start_x; $x <= $end_x; $x++) {
                    $grid->setPos($x, $y);
                    if (!empty($grid->findInAdjacentCellsRegex('/[^\.\d]/', true))) {
                        // Adjacent to some sort of symbol
                        echo ", adjacent to a symbol\n";
                        $sum += $part_number;
                        continue 2;
                    }
                }
                echo ", not adjacent to any symbol\n";
            }
        }
        echo "\n";

        $this->setPuzzleAnswer((string)$sum);

        return $this;
    }
}
