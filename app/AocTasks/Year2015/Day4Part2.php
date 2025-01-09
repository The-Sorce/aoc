<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use App\AocTasks\AocTask;

class Day4Part2 extends AocTask
{
    protected $dayName = 'The Ideal Stocking Stuffer';

    public function run(): AocTask
    {
        $i = 0;
        while (!str_starts_with(md5($this->getInput() . $i), '000000')) $i++;

        $this->setResultDescription('The lowest number to produce a hash beginning with six zeroes');
        $this->setResult((string)$i);

        return $this;
    }
}
