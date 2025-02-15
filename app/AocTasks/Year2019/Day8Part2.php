<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day8Part2 extends Puzzle
{
    protected string $puzzleName = 'Space Image Format';

    protected string $puzzleAnswerDescription = 'Message produced after decoding the image';

    public function solve(): Puzzle
    {
        $inputArray = str_split($this->getPuzzleInput());

        $width = 25;
        $height = 6;
        $layers = array_chunk($inputArray, $width * $height);

        for ($i = 0; $i < $width * $height; $i++) {
            for ($j = 0; $j < count($layers); $j++) {
                $px_color = $layers[$j][$i];
                if ($px_color != 2) break;
            }
            echo ($px_color == 0) ? ' ' : '█';
            if (($i + 1) % $width == 0) echo "\n";
        }
        echo "\n";

        $this->setPuzzleAnswer('See above ¯\_(ツ)_/¯');

        return $this;
    }
}
