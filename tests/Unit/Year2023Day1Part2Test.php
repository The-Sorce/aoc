<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day1Part2;

describe('Year2023Day1Part2', function () {

    test('calibration value for two1nine is 29', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('two1nine')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('29');
    });

    test('calibration value for eightwothree is 83', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('eightwothree')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('83');
    });

    test('calibration value for abcone2threexyz is 13', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('abcone2threexyz')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('13');
    });

    test('calibration value for xtwone3four is 24', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('xtwone3four')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('24');
    });

    test('calibration value for 4nineeightseven2 is 42', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('4nineeightseven2')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('42');
    });

    test('calibration value for zoneight234 is 14', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('zoneight234')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('14');
    });

    test('calibration value for 7pqrstsixteen is 76', function () {
        $solution = new Day1Part2();
        $answer = $solution->setPuzzleInput('7pqrstsixteen')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('76');
    });

    test('calibration value for all seven lines is 281', function () {
        $solution = new Day1Part2();
        $input = <<<EOL
        two1nine
        eightwothree
        abcone2threexyz
        xtwone3four
        4nineeightseven2
        zoneight234
        7pqrstsixteen
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('281');
    });

});
