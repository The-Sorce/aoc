<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day1Part1;

describe('Year2019Day1Part1', function () {

    test('mass 12 requires 2 fuel', function () {
        $solution = new Day1Part1();
        $answer = $solution->setPuzzleInput('12')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

    test('mass 14 requires 2 fuel', function () {
        $solution = new Day1Part1();
        $answer = $solution->setPuzzleInput('14')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

    test('mass 1969 requires 654 fuel', function () {
        $solution = new Day1Part1();
        $answer = $solution->setPuzzleInput('1969')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('654');
    });

    test('mass 100756 requires 33583 fuel', function () {
        $solution = new Day1Part1();
        $answer = $solution->setPuzzleInput('100756')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('33583');
    });

});
