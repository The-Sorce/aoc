<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\AocTask;

class Day1Part2 extends AocTask
{
    protected $dayName = 'The Tyranny of the Rocket Equation';

    public function run(): AocTask
    {
        $inputArray = explode("\n", $this->getInput());

        $fuelSum = 0;
        foreach ($inputArray as $i) {
            while ($i > 0) {
                $fuel = floor($i / 3) - 2;
                if ($fuel > 0) {
                    $fuelSum += $fuel;
                }
                $i = $fuel;
            }
        }
        
        $this->setResultDescription('The sum of the fuel requirements');
        $this->setResult((string)$fuelSum);

        return $this;
    }
}