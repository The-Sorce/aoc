<?php

namespace App\AocTasks;

class Day1Part2 extends AocTask
{
    protected $dayName = 'The Tyranny of the Rocket Equation';

    public function run(): AocTask
    {
        $input_array = explode("\n", $this->getInput());

        $fuel_sum = 0;
        foreach ($input_array as $i) {
            while ($i > 0) {
                $fuel = floor($i / 3) - 2;
                if ($fuel > 0) {
                    $fuel_sum += $fuel;
                }
                $i = $fuel;
            }
        }
        
        $this->setResultDescription('The sum of the fuel requirements');
        $this->setResult($fuel_sum);

        return $this;
    }
}
