<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day16Part2;

describe('Year2019Day16Part2', function () {

    test('Test case 1', function () {
        $solution = new Day16Part2();
        $input = '03036732577212944063491565474664';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('84462026');
    });

    test('Test case 2', function () {
        $solution = new Day16Part2();
        $input = '02935109699940807407585447034323';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('78725270');
    });

    test('Test case 3', function () {
        $solution = new Day16Part2();
        $input = '03081770884921959731165446850517';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('53553731');
    });

});
