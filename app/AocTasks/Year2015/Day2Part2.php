<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use App\AocTasks\AocTask;

class Day2Part2 extends AocTask
{
    protected $dayName = 'I Was Told There Would Be No Math';

    public function run(): AocTask
    {
        $inputArray = explode("\n", $this->getInput());

        $sum = 0;
        foreach ($inputArray as $row) {
            $dimensions = explode('x', $row);

            $bowLength = array_product($dimensions);

            sort($dimensions);
            array_pop($dimensions);
            $ribbonLength = array_sum($dimensions) * 2;

            $sum += $bowLength + $ribbonLength;
        }

        $this->setResultDescription('Total feet of ribbon required');
        $this->setResult((string)$sum);

        return $this;
    }
}
