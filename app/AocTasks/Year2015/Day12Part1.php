<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use App\AocTasks\AocTask;

class Day12Part1 extends AocTask
{
    protected $dayName = 'JSAbacusFramework.io';

    public function run(): AocTask
    {
        preg_match_all('/-?[0-9]+/', $this->getInput(), $matches);

        $this->setResultDescription('The sum of all numbers in the document');
        $this->setResult((string)array_sum($matches[0]));

        return $this;
    }
}
