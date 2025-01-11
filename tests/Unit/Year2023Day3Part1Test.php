<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day3Part1;

describe('Year2023Day3Part1', function () {

    test('Sum of part numbers for example engine schematic is 4361', function () {
        $solution = new Day3Part1();
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
        expect($answer)->toBe('4361');
    });

});
