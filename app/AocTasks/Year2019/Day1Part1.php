<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\AocTask;

class Day1Part1 extends AocTask
{
    protected $dayName = 'The Tyranny of the Rocket Equation';

    public function run(): AocTask
    {
        $inputArray = explode("\n", $this->getInput());

        $fuel = 0;
        foreach ($inputArray as $i) {
            $fuel += floor($i / 3) - 2;
        }
        
        $this->setResultDescription('The sum of the fuel requirements');
        $this->setResult((string)$fuel);

        return $this;
    }
}
