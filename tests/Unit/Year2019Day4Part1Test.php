<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day4Part1;

describe('Year2019Day4Part1', function () {

    test('Password 111111 meets the criteria', function () {
        $solution = new Day4Part1();
        $input = '111111-111111';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('Password 223450 does not meet the criteria', function () {
        $solution = new Day4Part1();
        $input = '223450-223450';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Password 123789 does not meet the criteria', function () {
        $solution = new Day4Part1();
        $input = '123789-123789';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

});
