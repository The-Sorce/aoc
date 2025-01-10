<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day10Part1;

describe('Year2015Day10Part1', function () {

    test('Look-and-say representation of 1 is 11', function () {
        $task = new Day10Part1();
        $result = $task->lookAndSay('1');
        expect($result)->toBe('11');
    });

    test('Look-and-say representation of 11 is 21', function () {
        $task = new Day10Part1();
        $result = $task->lookAndSay('11');
        expect($result)->toBe('21');
    });

    test('Look-and-say representation of 21 is 1211', function () {
        $task = new Day10Part1();
        $result = $task->lookAndSay('21');
        expect($result)->toBe('1211');
    });

    test('Look-and-say representation of 1211 is 111221', function () {
        $task = new Day10Part1();
        $result = $task->lookAndSay('1211');
        expect($result)->toBe('111221');
    });

    test('Look-and-say representation of 111221 is 312211', function () {
        $task = new Day10Part1();
        $result = $task->lookAndSay('111221');
        expect($result)->toBe('312211');
    });

});
