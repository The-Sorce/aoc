<?php
declare(strict_types=1);

use App\AocTasks\Year2023\Day6Part2;

describe('Year2023Day6Part2', function () {

    test('The record for the example race can be beaten in 71503 ways', function () {
        $task = new Day6Part2();
        $input = <<<EOL
        Time:      7  15   30
        Distance:  9  40  200
        EOL;
        $result = $task->setInput($input)->run()->getResult();
        expect($result)->toBe('71503');
    });

});
