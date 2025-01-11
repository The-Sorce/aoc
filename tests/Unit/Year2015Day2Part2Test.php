<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day2Part2;

describe('Year2015Day2Part2', function () {

    test('Dimensions 2x3x4 requires 34 feet of ribbon', function () {
        $solution = new Day2Part2();
        $answer = $solution->setPuzzleInput('2x3x4')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('34');
    });

    test('Dimensions 1x1x10 requires 14 feet of ribbon', function () {
        $solution = new Day2Part2();
        $answer = $solution->setPuzzleInput('1x1x10')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('14');
    });

    test('Both cases together require 48 feet of ribbon', function () {
        $solution = new Day2Part2();
        $input = <<<EOL
        2x3x4
        1x1x10
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('48');
    });

});
