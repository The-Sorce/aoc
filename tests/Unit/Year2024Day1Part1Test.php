<?php
declare(strict_types=1);

use App\AocTasks\Year2024\Day1Part1;

describe('Year2024Day1Part1', function () {

    test('The total distance for the example lists is 11', function () {
        $solution = new Day1Part1();
        $input = <<<EOL
        3   4
        4   3
        2   5
        1   3
        3   9
        3   3
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('11');
    });

});
