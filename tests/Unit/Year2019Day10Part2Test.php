<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day10Part2;

describe('Year2019Day10Part2', function () {

    test('Test case 1', function () {
        $solution = new Day10Part2();
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
        expect("{$solution->vaporizedAsteroids[1]['x']},{$solution->vaporizedAsteroids[1]['y']}")->toBe('11,12');
        expect("{$solution->vaporizedAsteroids[2]['x']},{$solution->vaporizedAsteroids[2]['y']}")->toBe('12,1');
        expect("{$solution->vaporizedAsteroids[3]['x']},{$solution->vaporizedAsteroids[3]['y']}")->toBe('12,2');
        expect("{$solution->vaporizedAsteroids[10]['x']},{$solution->vaporizedAsteroids[10]['y']}")->toBe('12,8');
        expect("{$solution->vaporizedAsteroids[20]['x']},{$solution->vaporizedAsteroids[20]['y']}")->toBe('16,0');
        expect("{$solution->vaporizedAsteroids[50]['x']},{$solution->vaporizedAsteroids[50]['y']}")->toBe('16,9');
        expect("{$solution->vaporizedAsteroids[100]['x']},{$solution->vaporizedAsteroids[100]['y']}")->toBe('10,16');
        expect("{$solution->vaporizedAsteroids[199]['x']},{$solution->vaporizedAsteroids[199]['y']}")->toBe('9,6');
        expect("{$solution->vaporizedAsteroids[200]['x']},{$solution->vaporizedAsteroids[200]['y']}")->toBe('8,2');
        expect("{$solution->vaporizedAsteroids[201]['x']},{$solution->vaporizedAsteroids[201]['y']}")->toBe('10,9');
        expect("{$solution->vaporizedAsteroids[299]['x']},{$solution->vaporizedAsteroids[299]['y']}")->toBe('11,1');
        expect($answer)->toBe('802');
    });

});
