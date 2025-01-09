<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day1Part1;

describe('Year2019Day1Part1', function () {

    test('mass 12 requires 2 fuel', function () {
        $task = new Day1Part1();
        $result = $task->setInput('12')->run()->getResult();
        expect($result)->toBe('2');
    });

    test('mass 14 requires 2 fuel', function () {
        $task = new Day1Part1();
        $result = $task->setInput('14')->run()->getResult();
        expect($result)->toBe('2');
    });

    test('mass 1969 requires 654 fuel', function () {
        $task = new Day1Part1();
        $result = $task->setInput('1969')->run()->getResult();
        expect($result)->toBe('654');
    });

    test('mass 100756 requires 33583 fuel', function () {
        $task = new Day1Part1();
        $result = $task->setInput('100756')->run()->getResult();
        expect($result)->toBe('33583');
    });

});