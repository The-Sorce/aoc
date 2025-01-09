<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day1Part2;

describe('Year2019Day1Part2', function () {

    test('mass 14 requires 2 fuel', function () {
        $task = new Day1Part2();
        $result = $task->setInput('14')->run()->getResult();
        expect($result)->toBe('2');
    });

    test('mass 1969 requires 966 fuel', function () {
        $task = new Day1Part2();
        $result = $task->setInput('1969')->run()->getResult();
        expect($result)->toBe('966');
    });

    test('mass 100756 requires 50346 fuel', function () {
        $task = new Day1Part2();
        $result = $task->setInput('100756')->run()->getResult();
        expect($result)->toBe('50346');
    });

});