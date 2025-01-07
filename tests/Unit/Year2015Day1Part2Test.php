<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day1Part2;

describe('Year2015Day1Part2', function () {

    test('Test case 1: ) results in character position 1', function () {
        $task = new Day1Part2();
        $result = $task->setInput(')')->run()->getResult();
        expect($result)->toBe('1');
    });

    test('Test case 2: ()()) results in character position 5', function () {
        $task = new Day1Part2();
        $result = $task->setInput('()())')->run()->getResult();
        expect($result)->toBe('5');
    });

});
