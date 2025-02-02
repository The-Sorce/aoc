<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day7Part1;

describe('Year2019Day7Part1', function () {

    test('Test case 1 max thruster signal is 43210', function () {
        $solution = new Day7Part1();
        $input = <<<EOL
        3,15,3,16,1002,16,10,16,1,16,15,15,4,15,99,0,0
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('43210');
    });

    test('Test case 2 max thruster signal is 54321', function () {
        $solution = new Day7Part1();
        $input = <<<EOL
        3,23,3,24,1002,24,10,24,1002,23,-1,23,101,5,23,23,1,24,23,23,4,23,99,0,0
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('54321');
    });

    test('Test case 3 max thruster signal is 65210', function () {
        $solution = new Day7Part1();
        $input = <<<EOL
        3,31,3,32,1002,32,10,32,1001,31,-2,31,1007,31,0,33,1002,33,7,33,1,33,31,31,1,32,31,31,4,31,99,0,0,0
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('65210');
    });

});
