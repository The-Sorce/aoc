<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day4Part2;

describe('Year2019Day4Part2', function () {

    test('Password 112233 meets the criteria', function () {
        $solution = new Day4Part2();
        $input = '112233-112233';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('Password 123444 does not meet the criteria', function () {
        $solution = new Day4Part2();
        $input = '123444-123444';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Password 111122 meets the criteria', function () {
        $solution = new Day4Part2();
        $input = '111122-111122';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

});
