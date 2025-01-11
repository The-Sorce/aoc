<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day1Part2;

describe('Year2015Day1Part2', function () {

    test('Test case 1: ) results in character position 1', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput(')')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('Test case 2: ()()) results in character position 5', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('()())')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('5');
    });

});
