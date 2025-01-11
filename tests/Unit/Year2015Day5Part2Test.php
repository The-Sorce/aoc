<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day5Part2;

describe('Year2015Day5Part2', function () {

    test('The string qjhvhtzxzqqjkmpb is nice', function () {
        $solution = new Day5Part2();
        $answer = $solution->setPuzzleInput('qjhvhtzxzqqjkmpb')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('The string xxyxx is nice', function () {
        $solution = new Day5Part2();
        $answer = $solution->setPuzzleInput('xxyxx')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1');
    });

    test('The string uurcxstgmygtbstg is naughty', function () {
        $solution = new Day5Part2();
        $answer = $solution->setPuzzleInput('uurcxstgmygtbstg')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('The string ieodomkazucvgmuy is naughty', function () {
        $solution = new Day5Part2();
        $answer = $solution->setPuzzleInput('ieodomkazucvgmuy')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('0');
    });

    test('Two of the four example strings are nice', function () {
        $solution = new Day5Part2();
        $input = <<<EOL
        qjhvhtzxzqqjkmpb
        xxyxx
        uurcxstgmygtbstg
        ieodomkazucvgmuy
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2');
    });

});
