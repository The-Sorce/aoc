<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day6Part1;

describe('Year2019Day6Part1', function () {

    test('Example map has a total of 42 orbits', function () {
        $solution = new Day6Part1();
        $input = <<<EOL
        COM)B
        B)C
        C)D
        D)E
        E)F
        B)G
        G)H
        D)I
        E)J
        J)K
        K)L
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('42');
    });

});
