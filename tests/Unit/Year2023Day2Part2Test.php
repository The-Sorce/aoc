<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day2Part2;

describe('Year2023Day2Part2', function () {

    test('Power of min set of cubes in game 1 is 48', function () {
        $task = new Day2Part2();
        $input = <<<EOL
        Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('48');
    });

    test('Power of min set of cubes in game 2 is 12', function () {
        $task = new Day2Part2();
        $input = <<<EOL
        Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('12');
    });

    test('Power of min set of cubes in game 3 is 1560', function () {
        $task = new Day2Part2();
        $input = <<<EOL
        Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('1560');
    });

    test('Power of min set of cubes in game 4 is 630', function () {
        $task = new Day2Part2();
        $input = <<<EOL
        Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('630');
    });

    test('Power of min set of cubes in game 5 is 36', function () {
        $task = new Day2Part2();
        $input = <<<EOL
        Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('36');
    });

    test('Sum of power of min set of cubes in games 1-5 is 2286', function () {
        $task = new Day2Part2();
        $input = <<<EOL
        Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
        Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
        Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
        Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
        Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('2286');
    });

});
