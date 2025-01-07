<?php
declare(strict_types=1);

use App\AocTasks\HelperClasses\IntcodeComputer;

describe('IntcodeComputer', function () {

    it('can get memory as array', function () {
        $input = '0,11,22,33,44,55';
        $expectedArray = [0, 11, 22, 33, 44, 55];

        $computer = new IntcodeComputer($input);
        expect($computer->getMemoryAsArray())->toBe($expectedArray);
    });

    it('can get memory as string', function () {
        $input = '0,11,22,33,44,55';

        $computer = new IntcodeComputer($input);
        expect($computer->getMemoryAsString())->toBe($input);
    });

    it('can get single memory pos', function () {
        $input = '0,11,22,33,44,55';
        $computer = new IntcodeComputer($input);
        expect($computer->getMemoryPos(3))->toBe(33);
    });

    it('can set single memory pos', function () {
        $input = '0,11,22,33,44,55';
        $computer = new IntcodeComputer($input);
        $computer->setMemoryPos(3, 66);
        expect($computer->getMemoryPos(3))->toBe(66);
    });

    it('can add (2 + 3 = 5)', function () {
        $input = '1,5,6,7,99,2,3,0';
        $expectedState = '1,5,6,7,99,2,3,5';

        $computer = new IntcodeComputer($input);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    it('can multiply (3 * 4 = 12)', function () {
        $input = '2,5,6,7,99,3,4,0';
        $expectedState = '2,5,6,7,99,3,4,12';

        $computer = new IntcodeComputer($input);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    it('can halt', function () {
        $input = '1,5,6,7,99,2,3,0';
        $computer = new IntcodeComputer($input);
        $computer->run();
        $instructionPointer = $computer->getInstructionPointer();
        expect($instructionPointer)->toBe(4);

    });

    it('catches invalid opcodes', function () {
        $input = '88,1,2,3,4,5';
        $computer = new IntcodeComputer($input);
        expect(fn() => $computer->run())->toThrow('Invalid opcode: 88');
    });

});

describe('Year2019Day2Part1', function () {

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
