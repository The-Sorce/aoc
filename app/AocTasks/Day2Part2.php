<?php
declare(strict_types=1);

namespace App\AocTasks;

use App\AocTasks\HelperClasses\IntcodeComputer;

class Day2Part2 extends AocTask
{
    protected $dayName = '1202 Program Alarm';

    public function run(): AocTask
    {
        $expectedOutput = 19690720;

        $computer = new IntcodeComputer();

        for ($noun = 0; $noun <= 99; $noun++) {
            for ($verb = 0; $verb <= 99; $verb++) {
                $computer->setMemory($this->getInput());
                $computer->setMemoryPos(1, $noun);
                $computer->setMemoryPos(2, $verb);
                $computer->run();
                $output = $computer->getMemoryAsArray()[0];
                if ($output == $expectedOutput) {
                    $this->setResultDescription('100 * noun + verb');
                    $this->setResult((string)(100 * $noun + $verb));
                    break 2;
                }
            }
        }

        return $this;
    }
}
