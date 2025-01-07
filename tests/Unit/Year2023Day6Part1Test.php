<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day6Part1;

describe('Year2023Day6Part1', function () {

    test('All example win scenario numbers multiplied together becomes 288', function () {
        $task = new Day6Part1();
        $input = <<<EOL
        Time:      7  15   30
        Distance:  9  40  200
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('288');
    });

});
