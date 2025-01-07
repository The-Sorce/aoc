<?php
declare(strict_types=1);

use App\AocTasks\HelperClasses\IntcodeComputer;

describe('Day2Part1', function () {

    test('Test case 1', function () {
        $input = '1,9,10,3,2,3,11,0,99,30,40,50';
        $expectedState = '3500,9,10,70,2,3,11,0,99,30,40,50';

        $computer = new IntcodeComputer($input);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Test case 2 (1 + 1 = 2)', function () {
        $input = '1,0,0,0,99';
        $expectedState = '2,0,0,0,99';

        $computer = new IntcodeComputer($input);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Test case 3 (3 * 2 = 6)', function () {
        $input = '2,3,0,3,99';
        $expectedState = '2,3,0,6,99';

        $computer = new IntcodeComputer($input);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Test case 4 (99 * 99 = 9801)', function () {
        $input = '2,4,4,5,99,0';
        $expectedState = '2,4,4,5,99,9801';

        $computer = new IntcodeComputer($input);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Test case 5', function () {
        $input = '1,1,1,4,99,5,6,0,99';
        $expectedState = '30,1,1,4,2,5,6,0,99';

        $computer = new IntcodeComputer($input);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

});
