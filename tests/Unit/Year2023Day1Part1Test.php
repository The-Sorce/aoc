<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day1Part1;

describe('Year2023Day1Part1', function () {

    test('calibration value for 1abc2 is 12', function () {
        $solution = new Day1Part1();
        $answer = $solution->setPuzzleInput('1abc2')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('12');
    });

    test('calibration value for pqr3stu8vwx is 38', function () {
        $solution = new Day1Part1();
        $answer = $solution->setPuzzleInput('pqr3stu8vwx')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('38');
    });

    test('calibration value for a1b2c3d4e5f is 15', function () {
        $solution = new Day1Part1();
        $answer = $solution->setPuzzleInput('a1b2c3d4e5f')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('15');
    });

    test('calibration value for treb7uchet is 77', function () {
        $solution = new Day1Part1();
        $answer = $solution->setPuzzleInput('treb7uchet')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('77');
    });

    test('calibration value for all four lines is 142', function () {
        $solution = new Day1Part1();
        $input = <<<EOL
        1abc2
        pqr3stu8vwx
        a1b2c3d4e5f
        treb7uchet
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('142');
    });

});
