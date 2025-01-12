<?php
declare(strict_types=1);

namespace App\AocTasks\Year2024;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part1 extends Puzzle
{
    protected string $puzzleName = 'Historian Hysteria';

    protected string $puzzleAnswerDescription = 'Total distance between the lists';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $list1 = [];
        $list2 = [];

        foreach (explode("\n", $input) as $row) {
            $row_elements = explode(" ", $row);
            $list1[] = $row_elements[0];
            $list2[] = $row_elements[3];
        }

        sort($list1);
        sort($list2);

        $tot_distance = 0;
        for ($i = 0; $i < count($list1); $i++) {
            $distance = abs($list1[$i] - $list2[$i]);
            $this->debug("{$list1[$i]} & {$list2[$i]}, distance {$distance}");
            $tot_distance += $distance;
        }
        $this->debug('');

        $this->setPuzzleAnswer((string)$tot_distance);

        return $this;
    }
}
