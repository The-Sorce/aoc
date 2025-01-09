<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use App\AocTasks\AocTask;

class Day2Part1 extends AocTask
{
    protected $dayName = 'I Was Told There Would Be No Math';

    public function run(): AocTask
    {
        $inputArray = explode("\n", $this->getInput());

        $sum = 0;
        foreach ($inputArray as $row) {
            $dimensions = explode('x', $row);

            $l = $dimensions[0];
            $w = $dimensions[1];
            $h = $dimensions[2];

            $surfaceArea = 2*$l*$w + 2*$w*$h + 2*$h*$l;
            $slack = min([$l*$w, $w*$h,$h*$l]);
            $sum += $surfaceArea + $slack;
        }

        $this->setResultDescription('Total square feet of wrapping paper required');
        $this->setResult((string)$sum);

        return $this;
    }
}
