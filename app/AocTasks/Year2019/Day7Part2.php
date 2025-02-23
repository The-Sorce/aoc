<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use drupol\phpermutations\Generators\Permutations;
use NorthernBytes\AocHelper\Puzzle;

class Day7Part2 extends Puzzle
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
        $permutations = new Permutations([5, 6, 7, 8, 9], 5);

        foreach ($permutations->generator() as $permutation) {
            $this->debug('Permutation ' . implode(',', $permutation));

            // Spawn 5 amps and generate I/O sockets for them
            $amps = [];
            $ioStreams = [];
            for ($i = 0; $i < 5; $i++) {
                $amps[$i] = new IntcodeComputer($amplifierProgram);
                $ioStreams[$i] = stream_socket_pair(STREAM_PF_UNIX, STREAM_SOCK_STREAM, STREAM_IPPROTO_IP);
            }

            // Connect all streams to the amps
            $amps[0]->setIoStreams($ioStreams[0][1], $ioStreams[1][0]);
            $amps[1]->setIoStreams($ioStreams[1][1], $ioStreams[2][0]);
            $amps[2]->setIoStreams($ioStreams[2][1], $ioStreams[3][0]);
            $amps[3]->setIoStreams($ioStreams[3][1], $ioStreams[4][0]);
            $amps[4]->setIoStreams($ioStreams[4][1], $ioStreams[0][0]);

            // Set phase setting for all amps
            for ($i = 0; $i < 5; $i++) {
                // Functionally equivalent to this, which is not possible with STREAM I/O mode:
                // $amps[$i]->addInput($permutation[$i]);
                fwrite($ioStreams[$i][0], "{$permutation[$i]},");
            }

            // Send input signal to first amp
            $signal = 0;
            fwrite($ioStreams[0][0], "{$signal},");

            // Run all amps
            $amps[0]->runInBackground();
            $amps[1]->runInBackground();
            $amps[2]->runInBackground();
            $amps[3]->runInBackground();
            $amps[4]->run();

            $signal = last($amps[4]->getOutputAsArray());
            $this->debug("Signal after last amp halted: {$signal}");

            $highestSignal = max($highestSignal, $signal);
            $this->debug('');
        }

        $this->setPuzzleAnswer((string)$highestSignal);

        return $this;
    }
}
