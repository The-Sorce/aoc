<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use App\AocTasks\AocTask;

class Day1Part2 extends AocTask
{
    protected $dayName = 'Not Quite Lisp';

    public function run(): AocTask
    {
        $inputArray = str_split($this->getInput());

        $floor = 0;
        foreach ($inputArray as $i => $char) {
            $floor += ($char == '(') ? 1 : -1;
            if ($floor < 0) {
                $this->setResultDescription('What is the position of the character that causes Santa to first enter the basement');
                $this->setResult((string)($i + 1));
                break;
            }

        }

        return $this;
    }
}
