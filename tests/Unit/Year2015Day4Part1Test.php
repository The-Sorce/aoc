<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day4Part1;

describe('Year2015Day4Part1', function () {

    test('For secret key abcdef, the answer is 609043', function () {
        $solution = new Day4Part1();
        $answer = $solution->setPuzzleInput('abcdef')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('609043');
    });

    test('For secret key pqrstuv, the answer is 1048970', function () {
        $solution = new Day4Part1();
        $answer = $solution->setPuzzleInput('pqrstuv')->solve()->getPuzzleAnswer();
        expect($answer)->toBe('1048970');
    });

});
