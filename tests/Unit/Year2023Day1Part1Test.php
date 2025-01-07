<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day1Part1;

describe('Year2023Day1Part1', function () {

    test('calibration value for 1abc2 is 12', function () {
        $task = new Day1Part1();
        $result = $task->setInput('1abc2')->run()->getResult();
        expect($result)->toBe('12');
    });

    test('calibration value for pqr3stu8vwx is 38', function () {
        $task = new Day1Part1();
        $result = $task->setInput('pqr3stu8vwx')->run()->getResult();
        expect($result)->toBe('38');
    });

    test('calibration value for a1b2c3d4e5f is 15', function () {
        $task = new Day1Part1();
        $result = $task->setInput('a1b2c3d4e5f')->run()->getResult();
        expect($result)->toBe('15');
    });

    test('calibration value for treb7uchet is 77', function () {
        $task = new Day1Part1();
        $result = $task->setInput('treb7uchet')->run()->getResult();
        expect($result)->toBe('77');
    });

    test('calibration value for all four lines is 142', function () {
        $task = new Day1Part1();
        $input = <<<EOL
        1abc2
        pqr3stu8vwx
        a1b2c3d4e5f
        treb7uchet
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('142');
    });

});
