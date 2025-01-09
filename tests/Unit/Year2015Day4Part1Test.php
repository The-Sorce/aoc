<?php
declare(strict_types=1);

use App\AocTasks\Year2015\Day4Part1;

describe('Year2015Day4Part1', function () {

    test('For secret key abcdef, the answer is 609043', function () {
        $task = new Day4Part1();
        $result = $task->setInput('abcdef')->run()->getResult();
        expect($result)->toBe('609043');
    });

    test('For secret key pqrstuv, the answer is 1048970', function () {
        $task = new Day4Part1();
        $result = $task->setInput('pqrstuv')->run()->getResult();
        expect($result)->toBe('1048970');
    });

});
