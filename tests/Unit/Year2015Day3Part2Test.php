<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day3Part2;

describe('Year2015Day3Part2', function () {

    test('Moves ^v delivers presents to 3 houses', function () {
        $solution = new Day3Part2();
        $answer = $solution->setPuzzleInput('^v')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('3');
    });

    test('Moves ^>v< delivers presents to 3 houses', function () {
        $solution = new Day3Part2();
        $answer = $solution->setPuzzleInput('^>v<')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('3');
    });

    test('Moves ^v^v^v^v^v delivers presents to 11 houses', function () {
        $solution = new Day3Part2();
        $answer = $solution->setPuzzleInput('^v^v^v^v^v')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('11');
    });

});
