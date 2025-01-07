<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day1Part2;

describe('Year2023Day1Part2', function () {

    test('calibration value for two1nine is 29', function () {
        $task = new Day1Part2();
        $result = $task->setInput('two1nine')->run()->getResult();
        expect($result)->toBe('29');
    });

    test('calibration value for eightwothree is 83', function () {
        $task = new Day1Part2();
        $result = $task->setInput('eightwothree')->run()->getResult();
        expect($result)->toBe('83');
    });

    test('calibration value for abcone2threexyz is 13', function () {
        $task = new Day1Part2();
        $result = $task->setInput('abcone2threexyz')->run()->getResult();
        expect($result)->toBe('13');
    });

    test('calibration value for xtwone3four is 24', function () {
        $task = new Day1Part2();
        $result = $task->setInput('xtwone3four')->run()->getResult();
        expect($result)->toBe('24');
    });

    test('calibration value for 4nineeightseven2 is 42', function () {
        $task = new Day1Part2();
        $result = $task->setInput('4nineeightseven2')->run()->getResult();
        expect($result)->toBe('42');
    });

    test('calibration value for zoneight234 is 14', function () {
        $task = new Day1Part2();
        $result = $task->setInput('zoneight234')->run()->getResult();
        expect($result)->toBe('14');
    });

    test('calibration value for 7pqrstsixteen is 76', function () {
        $task = new Day1Part2();
        $result = $task->setInput('7pqrstsixteen')->run()->getResult();
        expect($result)->toBe('76');
    });

    test('calibration value for all seven lines is 281', function () {
        $task = new Day1Part2();
        $input = <<<EOL
        two1nine
        eightwothree
        abcone2threexyz
        xtwone3four
        4nineeightseven2
        zoneight234
        7pqrstsixteen
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('281');
    });

});
