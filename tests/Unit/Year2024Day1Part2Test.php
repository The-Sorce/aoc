<?php
declare(strict_types=1);

use App\AocTasks\Year2024\Day1Part2;

describe('Year2024Day1Part2', function () {

    test('The similarity score for the example lists is 31', function () {
        $solution = new Day1Part2();
        $input = <<<EOL
        3   4
        4   3
        2   5
        1   3
        3   9
        3   3
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('31');
    });

});
