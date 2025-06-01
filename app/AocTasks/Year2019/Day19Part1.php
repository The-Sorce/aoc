<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day19Part1 extends Puzzle
{
    protected string $puzzleName = 'Tractor Beam';

    protected string $puzzleAnswerDescription = 'Number of points affected by the tractor beam';

    public function solve(): Puzzle
    {
        $width = 50;
        $height = 50;

        $pointsAffected = 0;
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $computer = new IntcodeComputer($this->getPuzzleInput());
                $computer->addInput($x);
                $computer->addInput($y);
                $computer->run();

                $result = $computer->getNextOutput();
                if ($result === 1) $pointsAffected++;
            }
        }

        $this->setPuzzleAnswer((string)$pointsAffected);
        return $this;
    }
}
