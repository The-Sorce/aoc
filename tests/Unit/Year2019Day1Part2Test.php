<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day1Part2;

describe('Year2019Day1Part2', function () {

    test('mass 14 requires 2 fuel', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('14')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

    test('mass 1969 requires 966 fuel', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('1969')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('966');
    });

    test('mass 100756 requires 50346 fuel', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('100756')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('50346');
    });

});
