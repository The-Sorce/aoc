<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day3Part1;

describe('Year2015Day3Part1', function () {

    test('Move > delivers presents to 2 houses', function () {
        $task = new Day3Part1();
        $result = $task->setInput('>')->run()->getResult();
        expect($result)->toBe('2');
    });

    test('Moves ^>v< delivers presents to 4 houses', function () {
        $task = new Day3Part1();
        $result = $task->setInput('^>v<')->run()->getResult();
        expect($result)->toBe('4');
    });

    test('Moves ^v^v^v^v^v delivers presents to 2 houses', function () {
        $task = new Day3Part1();
        $result = $task->setInput('^v^v^v^v^v')->run()->getResult();
        expect($result)->toBe('2');
    });

});
