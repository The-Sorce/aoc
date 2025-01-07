<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day1Part1;

describe('Year2015Day1Part1', function () {

    test('Test case 1: (()) results in floor 0', function () {
        $task = new Day1Part1();
        $result = $task->setInput('(())')->run()->getResult();
        expect($result)->toBe('0');
    });

    test('Test case 2: ()() results in floor 0', function () {
        $task = new Day1Part1();
        $result = $task->setInput('()()')->run()->getResult();
        expect($result)->toBe('0');
    });

    test('Test case 3: ((( results in floor 3', function () {
        $task = new Day1Part1();
        $result = $task->setInput('(((')->run()->getResult();
        expect($result)->toBe('3');
    });

    test('Test case 4: (()(()( results in floor 3', function () {
        $task = new Day1Part1();
        $result = $task->setInput('(()(()(')->run()->getResult();
        expect($result)->toBe('3');
    });

    test('Test case 5: ))((((( results in floor 3', function () {
        $task = new Day1Part1();
        $result = $task->setInput('))(((((')->run()->getResult();
        expect($result)->toBe('3');
    });

    test('Test case 6: ()) results in floor -1', function () {
        $task = new Day1Part1();
        $result = $task->setInput('())')->run()->getResult();
        expect($result)->toBe('-1');
    });

    test('Test case 7: ))( results in floor -1', function () {
        $task = new Day1Part1();
        $result = $task->setInput('))(')->run()->getResult();
        expect($result)->toBe('-1');
    });

    test('Test case 8: ))) results in floor -3', function () {
        $task = new Day1Part1();
        $result = $task->setInput(')))')->run()->getResult();
        expect($result)->toBe('-3');
    });

    test('Test case 9: )())()) results in floor -3', function () {
        $task = new Day1Part1();
        $result = $task->setInput(')())())')->run()->getResult();
        expect($result)->toBe('-3');
    });

});
