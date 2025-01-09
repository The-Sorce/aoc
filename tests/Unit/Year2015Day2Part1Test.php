<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day2Part1;

describe('Year2015Day2Part1', function () {

    test('Dimensions 2x3x4 requires 58 square feet', function () {
        $task = new Day2Part1();
        $result = $task->setInput('2x3x4')->run()->getResult();
        expect($result)->toBe('58');
    });

    test('Dimensions 1x1x10 requires 43 square feet', function () {
        $task = new Day2Part1();
        $result = $task->setInput('1x1x10')->run()->getResult();
        expect($result)->toBe('43');
    });

    test('Both cases together require 101 square feet', function () {
        $task = new Day2Part1();
        $input = <<<EOL
        2x3x4
        1x1x10
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('101');
    });

});
