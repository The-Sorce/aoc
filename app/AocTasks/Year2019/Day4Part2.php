<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day4Part2 extends Puzzle
{
    protected string $puzzleName = 'Secure Container';

    protected string $puzzleAnswerDescription = 'The number of passwords that meet the criteria';

    public function solve(): Puzzle
    {
        [$from, $to] = explode('-', $this->getPuzzleInput());
        $validPasswords = 0;

        for ($password = $from; $password <= $to; $password++) {
            // Two adjacent digits are the same
            if (!preg_match('/[^0]00[^0]|[^1]11[^1]|[^2]22[^2]|[^3]33[^3]|[^4]44[^4]|[^5]55[^5]|[^6]66[^6]|[^7]77[^7]|[^8]88[^8]|[^9]99[^9]/', "X{$password}X")) continue;

            // Going from left to right, the digits never decrease
            if (!preg_match('/^0*1*2*3*4*5*6*7*8*9*$/', (string)$password)) continue;

            $validPasswords++;
        }

        $this->setPuzzleAnswer((string)$validPasswords);

        return $this;
    }
}
