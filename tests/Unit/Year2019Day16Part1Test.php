<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day16Part1;

describe('Year2019Day16Part1', function () {

    test('Test case 1', function () {
        $solution = new Day16Part1();
        $input = '80871224585914546619083218645595';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('24176176');
    });

    test('Test case 2', function () {
        $solution = new Day16Part1();
        $input = '19617804207202209144916044189917';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('73745418');
    });

    test('Test case 3', function () {
        $solution = new Day16Part1();
        $input = '69317163492948606335995924319873';
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('52432133');
    });

});
