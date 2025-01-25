<?php
declare(strict_types=1);

use App\AocTasks\HelperClasses\IntcodeComputer;

describe('IntcodeComputer', function () {

    it('can get memory as array', function () {
        $program = '0,11,22,33,44,55';
        $expectedArray = [0, 11, 22, 33, 44, 55];

        $computer = new IntcodeComputer($program);
        expect($computer->getMemoryAsArray())->toBe($expectedArray);
    });

    it('can get memory as string', function () {
        $program = '0,11,22,33,44,55';

        $computer = new IntcodeComputer($program);
        expect($computer->getMemoryAsString())->toBe($program);
    });

    it('can get single memory pos', function () {
        $program = '0,11,22,33,44,55';
        $computer = new IntcodeComputer($program);
        expect($computer->getMemoryPos(3))->toBe(33);
    });

    it('can set single memory pos', function () {
        $program = '0,11,22,33,44,55';
        $computer = new IntcodeComputer($program);
        $computer->setMemoryPos(3, 66);
        expect($computer->getMemoryPos(3))->toBe(66);
    });

    it('can add (2 + 3 = 5)', function () {
        $program = '1,5,6,7,99,2,3,0';
        $expectedState = '1,5,6,7,99,2,3,5';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    it('can multiply (3 * 4 = 12)', function () {
        $program = '2,5,6,7,99,3,4,0';
        $expectedState = '2,5,6,7,99,3,4,12';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    it('can halt', function () {
        $program = '1,5,6,7,99,2,3,0';
        $computer = new IntcodeComputer($program);
        $computer->run();
        $instructionPointer = $computer->getInstructionPointer();
        expect($instructionPointer)->toBe(4);

    });

    it('catches invalid opcodes', function () {
        $program = '88,1,2,3,4,5';
        $computer = new IntcodeComputer($program);
        expect(fn() => $computer->run())->toThrow('Invalid opcode: 88');
    });

    it('can read input', function () {
        $program = '3,50,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(1337);
        $computer->run();
        expect($computer->getMemoryPos(50))->toBe(1337);
    });

    it('throws exception for missing input', function () {
        $program = '3,50,99';
        $computer = new IntcodeComputer($program);
        expect(fn() => $computer->run())->toThrow('Missing input');
    });

    it('can write output', function () {
        $program = '4,50,99';
        $computer = new IntcodeComputer($program);
        $computer->setMemoryPos(50, 1337);
        $computer->run();
        expect($computer->getOutputAsArray())->toBe([1337]);
        expect($computer->getOutputAsString())->toBe('1337');
    });

});

describe('Year2019Day2Part1', function () {

    test('Test case 1', function () {
        $program = '1,9,10,3,2,3,11,0,99,30,40,50';
        $expectedState = '3500,9,10,70,2,3,11,0,99,30,40,50';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Test case 2 (1 + 1 = 2)', function () {
        $program = '1,0,0,0,99';
        $expectedState = '2,0,0,0,99';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Test case 3 (3 * 2 = 6)', function () {
        $program = '2,3,0,3,99';
        $expectedState = '2,3,0,6,99';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Test case 4 (99 * 99 = 9801)', function () {
        $program = '2,4,4,5,99,0';
        $expectedState = '2,4,4,5,99,9801';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Test case 5', function () {
        $program = '1,1,1,4,99,5,6,0,99';
        $expectedState = '30,1,1,4,2,5,6,0,99';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

});

describe('Year2019Day5Part1', function () {

    test('Input/Output test case', function () {
        // The program 3,0,4,0,99 outputs whatever it gets as input, then halts.
        $program = '3,0,4,0,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(12345);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('12345');
    });

    test('Multiply with immediate mode parameter', function () {
        $program = '1002,4,3,4,33';
        $expectedState = '1002,4,3,4,99';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

    test('Integers can be negative', function () {
        $program = '1101,100,-1,4,0';
        $expectedState = '1101,100,-1,4,99';

        $computer = new IntcodeComputer($program);
        $computer->run();
        $state = $computer->getMemoryAsString();
        expect($state)->toBe($expectedState);
    });

});

describe('Year2019Day5Part2', function () {

    test('Test case 1a (equal, position mode, true)', function () {
        $program = '3,9,8,9,10,9,4,9,99,-1,8';
        $computer = new IntcodeComputer($program);
        $computer->addInput(8);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('1');
    });

    test('Test case 1b (equal, position mode, false)', function () {
        $program = '3,9,8,9,10,9,4,9,99,-1,8';
        $computer = new IntcodeComputer($program);
        $computer->addInput(6);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('0');
    });

    test('Test case 2a (less than, position mode, true)', function () {
        $program = '3,9,7,9,10,9,4,9,99,-1,8';
        $computer = new IntcodeComputer($program);
        $computer->addInput(6);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('1');
    });

    test('Test case 2b (less than, position mode, false)', function () {
        $program = '3,9,7,9,10,9,4,9,99,-1,8';
        $computer = new IntcodeComputer($program);
        $computer->addInput(10);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('0');
    });

    test('Test case 3a (equal, immediate mode, true)', function () {
        $program = '3,3,1108,-1,8,3,4,3,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(8);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('1');
    });

    test('Test case 3b (equal, immediate mode, false)', function () {
        $program = '3,3,1108,-1,8,3,4,3,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(6);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('0');
    });

    test('Test case 4a (less than, immediate mode, true)', function () {
        $program = '3,3,1107,-1,8,3,4,3,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(6);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('1');
    });

    test('Test case 4b (less than, immediate mode, false)', function () {
        $program = '3,3,1107,-1,8,3,4,3,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(10);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('0');
    });

    test('Test case 5a (jump, position mode, zero)', function () {
        $program = '3,12,6,12,15,1,13,14,13,4,13,99,-1,0,1,9';
        $computer = new IntcodeComputer($program);
        $computer->addInput(0);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('0');
    });

    test('Test case 5b (jump, position mode, non-zero)', function () {
        $program = '3,12,6,12,15,1,13,14,13,4,13,99,-1,0,1,9';
        $computer = new IntcodeComputer($program);
        $computer->addInput(1337);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('1');
    });

    test('Test case 6a (jump, immediate mode, zero)', function () {
        $program = '3,3,1105,-1,9,1101,0,0,12,4,12,99,1';
        $computer = new IntcodeComputer($program);
        $computer->addInput(0);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('0');
    });

    test('Test case 6b (jump, immediate mode, non-zero)', function () {
        $program = '3,3,1105,-1,9,1101,0,0,12,4,12,99,1';
        $computer = new IntcodeComputer($program);
        $computer->addInput(1337);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('1');
    });

    test('Test case 7a (output 999 for input < 8)', function () {
        $program = '3,21,1008,21,8,20,1005,20,22,107,8,21,20,1006,20,31,
1106,0,36,98,0,0,1002,21,125,20,4,20,1105,1,46,104,
999,1105,1,46,1101,1000,1,20,4,20,1105,1,46,98,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(6);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('999');
    });

    test('Test case 7b (output 1000 for input = 8)', function () {
        $program = '3,21,1008,21,8,20,1005,20,22,107,8,21,20,1006,20,31,
1106,0,36,98,0,0,1002,21,125,20,4,20,1105,1,46,104,
999,1105,1,46,1101,1000,1,20,4,20,1105,1,46,98,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(8);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('1000');
    });

    test('Test case 7c (output 1001 for input > 8)', function () {
        $program = '3,21,1008,21,8,20,1005,20,22,107,8,21,20,1006,20,31,
1106,0,36,98,0,0,1002,21,125,20,4,20,1105,1,46,104,
999,1105,1,46,1101,1000,1,20,4,20,1105,1,46,98,99';
        $computer = new IntcodeComputer($program);
        $computer->addInput(10);
        $computer->run();
        expect($computer->getOutputAsString())->toBe('1001');
    });

});
