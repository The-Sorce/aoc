<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day3Part2;

describe('Year2023Day3Part2', function () {

    test('Sum of all of the gear ratios in example engine schematic is 467835', function () {
        $solution = new Day3Part2();
        $input = <<<EOL
        467..114..
        ...*......
        ..35..633.
        ......#...
        617*......
        .....+.58.
        ..592.....
        ......755.
        ...$.*....
        .664.598..
        EOL;
        $answer = $solution->setPuzzleInput($input)->solve()->getPuzzleAnswer();
        expect($answer)->toBe('467835');
    });

});
