<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day6Part2;

describe('Year2023Day6Part2', function () {

    test('The record for the example race can be beaten in 71503 ways', function () {
        $solution = new Day6Part2();
        $input = <<<EOL
        Time:      7  15   30
        Distance:  9  40  200
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('71503');
    });

});
