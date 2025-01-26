<?php
declare(strict_types=1);

use App\AocTasks\Year2019\Day6Part2;

describe('Year2019Day6Part2', function () {

    test('Example map requires a minimum of 4 orbital transfers', function () {
        $solution = new Day6Part2();
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
        K)YOU
        I)SAN
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('4');
    });

});
