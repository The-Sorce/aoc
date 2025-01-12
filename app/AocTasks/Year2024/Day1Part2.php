<?php
declare(strict_types=1);

namespace App\AocTasks\Year2024;

use NorthernBytes\AocHelper\Puzzle;

class Day1Part2 extends Puzzle
{
    protected string $puzzleName = 'Historian Hysteria';

    protected string $puzzleAnswerDescription = 'The similarity score of the lists';

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

        $tot_sim_score = 0;
        for ($i = 0; $i < count($list1); $i++) {
            $comp_value = $list1[$i];
            $match_count = 0;
            foreach ($list2 as $x) {
                if ($x == $comp_value) {
                    $match_count++;
                }
            }
            $sim_score = $comp_value * $match_count;
            $this->debug("{$comp_value} appears in right list {$match_count} times, similarity score {$sim_score}");
            $tot_sim_score += $sim_score;
        }
        $this->debug('');

        $this->setPuzzleAnswer((string)$tot_sim_score);

        return $this;
    }
}
