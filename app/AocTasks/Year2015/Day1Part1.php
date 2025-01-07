<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use App\AocTasks\AocTask;

class Day1Part1 extends AocTask
{
    protected $dayName = 'Not Quite Lisp';

    public function run(): AocTask
    {
        $opening = substr_count($this->getInput(), '(');
        $closing = substr_count($this->getInput(), ')');

        $floor = $opening - $closing;

        $this->setResultDescription('To what floor do the instructions take Santa');
        $this->setResult((string)$floor);

        return $this;
    }
}
