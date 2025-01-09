<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day3Part2;

describe('Year2015Day3Part2', function () {

    test('Moves ^v delivers presents to 3 houses', function () {
        $task = new Day3Part2();
        $result = $task->setInput('^v')->run()->getResult();
        expect($result)->toBe('3');
    });

    test('Moves ^>v< delivers presents to 3 houses', function () {
        $task = new Day3Part2();
        $result = $task->setInput('^>v<')->run()->getResult();
        expect($result)->toBe('3');
    });

    test('Moves ^v^v^v^v^v delivers presents to 11 houses', function () {
        $task = new Day3Part2();
        $result = $task->setInput('^v^v^v^v^v')->run()->getResult();
        expect($result)->toBe('11');
    });

});
