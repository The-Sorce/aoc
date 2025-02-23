<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day10Part1;

describe('Year2019Day10Part1', function () {

    test('Test case 1', function () {
        $solution = new Day10Part1();
        $input = <<<EOL
        .#..#
        .....
        #####
        ....#
        ...##
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('8');
        expect("{$solution->bestAsteroid['x']},{$solution->bestAsteroid['y']}")->toBe('3,4');
    });

    test('Test case 2', function () {
        $solution = new Day10Part1();
        $input = <<<EOL
        ......#.#.
        #..#.#....
        ..#######.
        .#.#.###..
        .#..#.....
        ..#....#.#
        #..#....#.
        .##.#..###
        ##...#..#.
        .#....####
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('33');
        expect("{$solution->bestAsteroid['x']},{$solution->bestAsteroid['y']}")->toBe('5,8');
    });

    test('Test case 3', function () {
        $solution = new Day10Part1();
        $input = <<<EOL
        #.#...#.#.
        .###....#.
        .#....#...
        ##.#.#.#.#
        ....#.#.#.
        .##..###.#
        ..#...##..
        ..##....##
        ......#...
        .####.###.
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('35');
        expect("{$solution->bestAsteroid['x']},{$solution->bestAsteroid['y']}")->toBe('1,2');
    });

    test('Test case 4', function () {
        $solution = new Day10Part1();
        $input = <<<EOL
        .#..#..###
        ####.###.#
        ....###.#.
        ..###.##.#
        ##.##.#.#.
        ....###..#
        ..#.#..#.#
        #..#.#.###
        .##...##.#
        .....#.#..
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('41');
        expect("{$solution->bestAsteroid['x']},{$solution->bestAsteroid['y']}")->toBe('6,3');
    });

    test('Test case 5', function () {
        $solution = new Day10Part1();
        $input = <<<EOL
        .#..##.###...#######
        ##.############..##.
        .#.######.########.#
        .###.#######.####.#.
        #####.##.#.##.###.##
        ..#####..#.#########
        ####################
        #.####....###.#.#.##
        ##.#################
        #####.##.###..####..
        ..######..##.#######
        ####.##.####...##..#
        .#####..#.######.###
        ##...#.##########...
        #.##########.#######
        .####.#.###.###.#.##
        ....##.##.###..#####
        .#.#.###########.###
        #.#.#.#####.####.###
        ###.##.####.##.#..##
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('210');
        expect("{$solution->bestAsteroid['x']},{$solution->bestAsteroid['y']}")->toBe('11,13');
    });

});
