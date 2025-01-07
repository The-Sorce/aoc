<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day1Part1 extends AocTask
{
    protected $dayName = 'Trebuchet?!';

    public function run(): AocTask
    {
        $input = $this->getInput();

        preg_match_all('/(\d).*/', $input, $first_no_matches);
        preg_match_all('/.*(\d)/', $input, $last_no_matches);

        $sum = 0;
        for ($i = 0; $i < count($first_no_matches[1]); $i++) {
            $sum += (int)"{$first_no_matches[1][$i]}{$last_no_matches[1][$i]}";
        }

        $this->setResultDescription('Sum of calibration values');
        $this->setResult((string)$sum);

        return $this;
    }
}
