<?php

namespace App\AocTasks;

use App\AocTasks\HelperClasses\IntcodeComputer;

class Day2Part1 extends AocTask
{
    protected $dayName = '1202 Program Alarm';

    public function run(): AocTask
    {
        $computer = new IntcodeComputer($this->getInput());
        $this->intcodeComputer = $computer;

        $computer->setStatePos(1, 12);
        $computer->setStatePos(2, 2);

        $computer->run();

        $this->setResultDescription('Value left at position 0');
        $this->setResult($computer->getStateAsArray()[0]);

        return $this;
    }
}
