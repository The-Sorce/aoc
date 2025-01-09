<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day2Part2;

describe('Year2015Day2Part2', function () {

    test('Dimensions 2x3x4 requires 34 feet of ribbon', function () {
        $task = new Day2Part2();
        $result = $task->setInput('2x3x4')->run()->getResult();
        expect($result)->toBe('34');
    });

    test('Dimensions 1x1x10 requires 14 feet of ribbon', function () {
        $task = new Day2Part2();
        $result = $task->setInput('1x1x10')->run()->getResult();
        expect($result)->toBe('14');
    });

    test('Both cases together require 48 feet of ribbon', function () {
        $task = new Day2Part2();
        $input = <<<EOL
        2x3x4
        1x1x10
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('48');
    });

});
