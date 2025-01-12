<?php
declare(strict_types=1);

use App\AocTasks\Year2024\Day2Part2;

describe('Year2024Day2Part2', function () {

    test('Test report 1 is safe', function () {
        $solution = new Day2Part2();
        $input = <<<EOL
        7 6 4 2 1
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('Test report 2 is unsafe', function () {
        $solution = new Day2Part2();
        $input = <<<EOL
        1 2 7 8 9
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Test report 3 is unsafe', function () {
        $solution = new Day2Part2();
        $input = <<<EOL
        9 7 6 2 1
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Test report 4 is safe', function () {
        $solution = new Day2Part2();
        $input = <<<EOL
        1 3 2 4 5
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('Test report 5 is safe', function () {
        $solution = new Day2Part2();
        $input = <<<EOL
        8 6 4 4 1
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('Test report 6 is safe', function () {
        $solution = new Day2Part2();
        $input = <<<EOL
        1 3 6 7 9
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('In total, four of the six example reports are safe', function () {
        $solution = new Day2Part2();
        $input = <<<EOL
        7 6 4 2 1
        1 2 7 8 9
        9 7 6 2 1
        1 3 2 4 5
        8 6 4 4 1
        1 3 6 7 9
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('4');
    });

});
