<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day12Part2;

describe('Year2019Day12Part2', function () {

    test('Test case 1', function () {
        $solution = new Day12Part2();
        $input = <<<EOL
        <x=-1, y=0, z=2>
        <x=2, y=-10, z=-7>
        <x=4, y=-8, z=8>
        <x=3, y=5, z=-1>
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('2772');
    });

    test('Test case 2', function () {
        $solution = new Day12Part2();
        $input = <<<EOL
        <x=-8, y=-10, z=0>
        <x=5, y=5, z=10>
        <x=2, y=-7, z=3>
        <x=9, y=-8, z=-3>
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('4686774924');
    });

});
