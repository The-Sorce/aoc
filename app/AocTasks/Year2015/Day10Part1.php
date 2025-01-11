<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day10Part1 extends Puzzle
{
    protected string $puzzleName = 'Elves Look, Elves Say';

    protected string $puzzleAnswerDescription = 'The length of the result after 40 rounds of look-and-say';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        // TODO: This is way too slow, implement something smarter using memoization or similar...
        for ($i = 1; $i <= 40; $i++) {
            $input = $this->lookAndSay($input);
        }

        $this->setPuzzleAnswer((string)strlen($input));

        return $this;
    }

    public function lookAndSay($input): string
    {
        $firstChar = substr($input, 0, 1);
        preg_match("/^{$firstChar}+/", $input, $matches);
        $length = strlen($matches[0]);

        $result = "{$length}{$firstChar}";
        if ($length < strlen($input)) {
            $result .= $this->lookAndSay(substr($input, $length));
        }

        return $result;
    }
}
