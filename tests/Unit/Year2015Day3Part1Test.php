<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day3Part1;

describe('Year2015Day3Part1', function () {

    test('Move > delivers presents to 2 houses', function () {
        $solution = new Day3Part1();
        $answer = $solution->setPuzzleInput('>')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

    test('Moves ^>v< delivers presents to 4 houses', function () {
        $solution = new Day3Part1();
        $answer = $solution->setPuzzleInput('^>v<')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('4');
    });

    test('Moves ^v^v^v^v^v delivers presents to 2 houses', function () {
        $solution = new Day3Part1();
        $answer = $solution->setPuzzleInput('^v^v^v^v^v')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

});
