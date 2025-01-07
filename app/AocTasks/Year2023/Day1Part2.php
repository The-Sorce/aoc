<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day1Part2 extends AocTask
{
    protected $dayName = 'Trebuchet?!';

    public function run(): AocTask
    {
        $input = $this->getInput();

        preg_match_all('/(\d|one|two|three|four|five|six|seven|eight|nine).*/', $input, $first_no_matches);
        preg_match_all('/.*(\d|one|two|three|four|five|six|seven|eight|nine)/', $input, $last_no_matches);

        $text_values = [
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
        ];

        $sum = 0;
        for ($i = 0; $i < count($first_no_matches[1]); $i++) {
            $first_no = $first_no_matches[1][$i];
            $last_no = $last_no_matches[1][$i];
            if (!is_numeric($first_no)) {
                $first_no = $text_values[$first_no];
            }
            if (!is_numeric($last_no)) {
                $last_no = $text_values[$last_no];
            }
            $sum += (int)"{$first_no}{$last_no}";
        }

        $this->setResultDescription('Sum of calibration values');
        $this->setResult((string)$sum);

        return $this;
    }
}
