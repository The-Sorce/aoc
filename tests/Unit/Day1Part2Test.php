<?php

use App\AocTasks\Day1Part2;

describe('Day1Part2', function () {

    test('mass 14 requires 2 fuel', function () {
        $task = new Day1Part2();
        $result = $task->setInput(14)->run()->getResult();
        expect((int)$result)->toBe(2);
    });

    test('mass 1969 requires 966 fuel', function () {
        $task = new Day1Part2();
        $result = $task->setInput(1969)->run()->getResult();
        expect((int)$result)->toBe(966);
    });

    test('mass 100756 requires 50346 fuel', function () {
        $task = new Day1Part2();
        $result = $task->setInput(100756)->run()->getResult();
        expect((int)$result)->toBe(50346);
    });

});
