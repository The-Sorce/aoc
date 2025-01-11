<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day4Part1;

describe('Year2023Day4Part1', function () {

    test('Card 1 is worth 8 points', function () {
        $solution = new Day4Part1();
        $input = <<<EOL
        Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('8');
    });

    test('Card 2 is worth 2 points', function () {
        $solution = new Day4Part1();
        $input = <<<EOL
        Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

    test('Card 3 is worth 2 points', function () {
        $solution = new Day4Part1();
        $input = <<<EOL
        Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

    test('Card 4 is worth 1 point', function () {
        $solution = new Day4Part1();
        $input = <<<EOL
        Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('Card 5 is worth no points', function () {
        $solution = new Day4Part1();
        $input = <<<EOL
        Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Card 6 is worth no points', function () {
        $solution = new Day4Part1();
        $input = <<<EOL
        Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Cards 1-6 are worth 13 points in total', function () {
        $solution = new Day4Part1();
        $input = <<<EOL
        Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53
        Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19
        Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1
        Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83
        Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36
        Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('13');
    });

});
