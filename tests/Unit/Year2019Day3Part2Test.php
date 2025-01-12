<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day3Part2;

describe('Year2019Day3Part2', function () {

    test('Test case 1 total number of steps is 30', function () {
        $solution = new Day3Part2();
        $input = <<<EOL
        R8,U5,L5,D3
        U7,R6,D4,L4
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('30');
    });

    test('Test case 2 total number of steps is 610', function () {
        $solution = new Day3Part2();
        $input = <<<EOL
        R75,D30,R83,U83,L12,D49,R71,U7,L72
        U62,R66,U55,R34,D71,R55,D58,R83
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('610');
    });

    test('Test case 3 total number of steps is 410', function () {
        $solution = new Day3Part2();
        $input = <<<EOL
        R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51
        U98,R91,D20,R16,D67,R40,U7,R15,U6,R7
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('410');
    });

});
