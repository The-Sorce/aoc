<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use App\AocTasks\AocTask;

class Day3Part1 extends AocTask
{
    protected $dayName = 'Perfectly Spherical Houses in a Vacuum';

    public function run(): AocTask
    {
        $inputArray = str_split($this->getInput());

        $x = 0;
        $y = 0;
        $visitedHouses = [];
        $visitedHouses["{$x},{$y}"] = true;
        foreach ($inputArray as $move) {
            switch ($move) {
                case '^':
                    $y--;
                    break;
                case 'v':
                    $y++;
                    break;
                case '>':
                    $x++;
                    break;
                case '<':
                    $x--;
                    break;
            }
            $visitedHouses["{$x},{$y}"] = true;
        }

        $this->setResultDescription('Number of houses that receive at least one present');
        $this->setResult((string)count($visitedHouses));

        return $this;
    }
}
