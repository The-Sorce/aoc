<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day5Part2;

describe('Year2015Day5Part2', function () {

    test('The string qjhvhtzxzqqjkmpb is nice', function () {
        $task = new Day5Part2();
        $result = $task->setInput('qjhvhtzxzqqjkmpb')->run()->getResult();
        expect($result)->toBe('1');
    });

    test('The string xxyxx is nice', function () {
        $task = new Day5Part2();
        $result = $task->setInput('xxyxx')->run()->getResult();
        expect($result)->toBe('1');
    });

    test('The string uurcxstgmygtbstg is naughty', function () {
        $task = new Day5Part2();
        $result = $task->setInput('uurcxstgmygtbstg')->run()->getResult();
        expect($result)->toBe('0');
    });

    test('The string ieodomkazucvgmuy is naughty', function () {
        $task = new Day5Part2();
        $result = $task->setInput('ieodomkazucvgmuy')->run()->getResult();
        expect($result)->toBe('0');
    });

    test('Two of the four example strings are nice', function () {
        $task = new Day5Part2();
        $input = <<<EOL
        qjhvhtzxzqqjkmpb
        xxyxx
        uurcxstgmygtbstg
        ieodomkazucvgmuy
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('2');
    });

});
