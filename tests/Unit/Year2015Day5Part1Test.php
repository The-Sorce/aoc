<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day5Part1;

describe('Year2015Day5Part1', function () {

    test('The string ugknbfddgicrmopn is nice', function () {
        $solution = new Day5Part1();
        $answer = $solution->setPuzzleInput('ugknbfddgicrmopn')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('The string aaa is nice', function () {
        $solution = new Day5Part1();
        $answer = $solution->setPuzzleInput('aaa')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('The string jchzalrnumimnmhp is naughty', function () {
        $solution = new Day5Part1();
        $answer = $solution->setPuzzleInput('jchzalrnumimnmhp')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('The string haegwjzuvuyypxyu is naughty', function () {
        $solution = new Day5Part1();
        $answer = $solution->setPuzzleInput('haegwjzuvuyypxyu')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('The string dvszwmarrgswjxmb is naughty', function () {
        $solution = new Day5Part1();
        $answer = $solution->setPuzzleInput('dvszwmarrgswjxmb')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Two of the five example strings are nice', function () {
        $solution = new Day5Part1();
        $input = <<<EOL
        ugknbfddgicrmopn
        aaa
        jchzalrnumimnmhp
        haegwjzuvuyypxyu
        dvszwmarrgswjxmb
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

});
