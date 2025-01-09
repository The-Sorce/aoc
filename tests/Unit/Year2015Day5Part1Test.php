<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day5Part1;

describe('Year2015Day5Part1', function () {

    test('The string ugknbfddgicrmopn is nice', function () {
        $task = new Day5Part1();
        $result = $task->setInput('ugknbfddgicrmopn')->run()->getResult();
        expect($result)->toBe('1');
    });

    test('The string aaa is nice', function () {
        $task = new Day5Part1();
        $result = $task->setInput('aaa')->run()->getResult();
        expect($result)->toBe('1');
    });

    test('The string jchzalrnumimnmhp is naughty', function () {
        $task = new Day5Part1();
        $result = $task->setInput('jchzalrnumimnmhp')->run()->getResult();
        expect($result)->toBe('0');
    });

    test('The string haegwjzuvuyypxyu is naughty', function () {
        $task = new Day5Part1();
        $result = $task->setInput('haegwjzuvuyypxyu')->run()->getResult();
        expect($result)->toBe('0');
    });

    test('The string dvszwmarrgswjxmb is naughty', function () {
        $task = new Day5Part1();
        $result = $task->setInput('dvszwmarrgswjxmb')->run()->getResult();
        expect($result)->toBe('0');
    });

    test('Two of the five example strings are nice', function () {
        $task = new Day5Part1();
        $input = <<<EOL
        ugknbfddgicrmopn
        aaa
        jchzalrnumimnmhp
        haegwjzuvuyypxyu
        dvszwmarrgswjxmb
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('2');
    });

});
