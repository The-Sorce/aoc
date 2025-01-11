<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day12Part1;

describe('Year2015Day12Part1', function () {

    test('Test input 1 ([1,2,3]) has a sum of 6', function () {
        $solution = new Day12Part1();
        $answer = $solution->setPuzzleInput('[1,2,3]')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('6');
    });

    test('Test input 2 ({"a":2,"b":4}) has a sum of 6', function () {
        $solution = new Day12Part1();
        $answer = $solution->setPuzzleInput('{"a":2,"b":4}')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('6');
    });

    test('Test input 3 ([[[3]]]) has a sum of 3', function () {
        $solution = new Day12Part1();
        $answer = $solution->setPuzzleInput('[[[3]]]')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('3');
    });

    test('Test input 4 ({"a":{"b":4},"c":-1}) has a sum of 3', function () {
        $solution = new Day12Part1();
        $answer = $solution->setPuzzleInput('{"a":{"b":4},"c":-1}')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('3');
    });

    test('Test input 5 ({"a":[-1,1]}) has a sum of 0', function () {
        $solution = new Day12Part1();
        $answer = $solution->setPuzzleInput('{"a":[-1,1]}')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Test input 6 ([-1,{"a":1}]) has a sum of 0', function () {
        $solution = new Day12Part1();
        $answer = $solution->setPuzzleInput('[-1,{"a":1}]')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Test input 7 ([]) has a sum of 0', function () {
        $solution = new Day12Part1();
        $answer = $solution->setPuzzleInput('[]')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Test input 8 ({}) has a sum of 0', function () {
        $solution = new Day12Part1();
        $answer = $solution->setPuzzleInput('{}')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

});
