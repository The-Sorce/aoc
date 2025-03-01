<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day7Part2;

describe('Year2019Day7Part2', function () {

    test('Test case 1 max thruster signal is 139629729', function () {
        $solution = new Day7Part2();
        $input = <<<EOL
        3,26,1001,26,-4,26,3,27,1002,27,2,27,1,27,26,27,4,27,1001,28,-1,28,1005,28,6,99,0,0,5
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('139629729');
    });

    test('Test case 2 max thruster signal is 18216', function () {
        $solution = new Day7Part2();
        $input = <<<EOL
        3,52,1001,52,-5,52,3,53,1,52,56,54,1007,54,5,55,1005,55,26,1001,54,-5,54,1105,1,12,1,53,54,53,1008,54,0,55,1001,55,1,55,2,53,55,53,4,53,1001,56,-1,56,1005,56,6,99,0,0,0,0,10
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('18216');
    });

});
