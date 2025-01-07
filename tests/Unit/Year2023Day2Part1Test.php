<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day2Part1;

describe('Year2023Day2Part1', function () {

    test('Game 1 is possible', function () {
        $task = new Day2Part1();
        $input = <<<EOL
        Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('1');
    });

    test('Game 2 is possible', function () {
        $task = new Day2Part1();
        $input = <<<EOL
        Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('2');
    });

    test('Game 3 is impossible', function () {
        $task = new Day2Part1();
        $input = <<<EOL
        Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('0');
    });

    test('Game 4 is impossible', function () {
        $task = new Day2Part1();
        $input = <<<EOL
        Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('0');
    });

    test('Game 5 is possible', function () {
        $task = new Day2Part1();
        $input = <<<EOL
        Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('5');
    });

    test('Sum of possible games 1+2+5 is 8', function () {
        $task = new Day2Part1();
        $input = <<<EOL
        Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
        Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
        Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
        Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
        Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('8');
    });

});
