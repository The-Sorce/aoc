<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day7Part1;

describe('Year2015Day7Part1', function () {

    test('Example circuit gives right signals on all wires', function () {
        $solution = new Day7Part1();
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
        $solution->setPuzzleInput($input)->solve();
        expect($solution->getSignalForWire('d'))->toBe(72);
        expect($solution->getSignalForWire('e'))->toBe(507);
        expect($solution->getSignalForWire('f'))->toBe(492);
        expect($solution->getSignalForWire('g'))->toBe(114);
        expect($solution->getSignalForWire('h'))->toBe(65412);
        expect($solution->getSignalForWire('i'))->toBe(65079);
        expect($solution->getSignalForWire('x'))->toBe(123);
        expect($solution->getSignalForWire('y'))->toBe(456);
    });

});
