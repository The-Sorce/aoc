<?php
declare(strict_types=1);

namespace App\AocTasks;

use App\AocTasks\HelperClasses\IntcodeComputer;

class Day2Part1 extends AocTask
{
    protected $dayName = '1202 Program Alarm';

    public function run(): AocTask
    {
        $computer = new IntcodeComputer($this->getInput());

        $computer->setMemoryPos(1, 12);
        $computer->setMemoryPos(2, 2);

        $computer->run();

        $this->setResultDescription('Value left at position 0');
        $this->setResult((string)$computer->getMemoryPos(0));

        return $this;
    }
}
