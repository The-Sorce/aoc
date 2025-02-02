<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use drupol\phpermutations\Generators\Permutations;
use NorthernBytes\AocHelper\Puzzle;

class Day7Part1 extends Puzzle
{
    protected string $puzzleName = 'Amplification Circuit';

    protected string $puzzleAnswerDescription = 'The highest signal that can be sent to the thrusters';

    public function solve(): Puzzle
    {
        $amplifierProgram = $this->getPuzzleInput();

        // This is where our output (i.e. answer) goes
        $highestSignal = null;

        // Phase settings, there are 120 permutations (5!) in  total. I Couldn't
        // be bothered to write a permutation generator myself. Could have just
        // included a pre-generated list, but decided to use a library instead.
        $permutations = new Permutations([0, 1, 2, 3, 4], 5);

        foreach ($permutations->generator() as $permutation) {
            $this->debug('Permutation ' . implode(',', $permutation));
            $signal = 0; // input signal to first amp
            for ($i = 0; $i < 5; $i++) {
                $amp = new IntcodeComputer($amplifierProgram);
                $amp->addInput($permutation[$i]); // phase setting
                $amp->addInput($signal); // input signal
                $amp->run();

                $signal = $amp->getOutputAsArray()[0];
                $this->debug("Signal after amp {$i}: {$signal}");
            }
            $highestSignal = max($highestSignal, $signal);
            $this->debug('');
        }

        $this->setPuzzleAnswer((string)$highestSignal);

        return $this;
    }
}
