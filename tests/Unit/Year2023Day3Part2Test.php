<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day3Part2;

describe('Year2023Day3Part2', function () {

    test('Sum of all of the gear ratios in example engine schematic is 467835', function () {
        $task = new Day3Part2();
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
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('467835');
    });

});
