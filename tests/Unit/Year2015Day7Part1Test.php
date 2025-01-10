<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day7Part1;

describe('Year2015Day7Part1', function () {

    test('Example circuit gives right signals on all wires', function () {
        $task = new Day7Part1();
        $input = <<<EOL
        123 -> x
        456 -> y
        x AND y -> d
        x OR y -> e
        x LSHIFT 2 -> f
        y RSHIFT 2 -> g
        NOT x -> h
        NOT y -> i
        EOL;
        $task->setInput($input)->run();
        expect($task->getSignalForWire('d'))->toBe(72);
        expect($task->getSignalForWire('e'))->toBe(507);
        expect($task->getSignalForWire('f'))->toBe(492);
        expect($task->getSignalForWire('g'))->toBe(114);
        expect($task->getSignalForWire('h'))->toBe(65412);
        expect($task->getSignalForWire('i'))->toBe(65079);
        expect($task->getSignalForWire('x'))->toBe(123);
        expect($task->getSignalForWire('y'))->toBe(456);
    });

});
