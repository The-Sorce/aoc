<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day6Part2 extends Puzzle
{
    protected string $puzzleName = 'Universal Orbit Map';

    protected string $puzzleAnswerDescription = 'The minimum number of orbital transfers required';

    private array $orbitMap = [];

    public function solve(): Puzzle
    {
        $inputLines = explode("\n", $this->getPuzzleInput());

        foreach ($inputLines as $inputLine) {
            [$obj1, $obj2] = explode(')', $inputLine);
            $this->orbitMap[$obj2] = $obj1;
        }

        $youPath = [];
        $next = 'YOU';
        while (isset($this->orbitMap[$next])) {
            $next = $this->orbitMap[$next];
            $youPath[] = $next;
        }
        $this->debug("Path from YOU to COM:\n" . implode(',', $youPath));
        $this->debug('');

        $sanPath = [];
        $next = 'SAN';
        while (isset($this->orbitMap[$next])) {
            $next = $this->orbitMap[$next];
            $sanPath[] = $next;
        }
        $this->debug("Path from SAN to COM:\n" . implode(',', $sanPath));
        $this->debug('');

        $commonSteps = array_intersect($youPath, $sanPath);
        $firstCommonStep = reset($commonSteps);
        $this->debug("First common step for paths: {$firstCommonStep}");
        $this->debug('');

        $youOrbitalTransfers = array_search($firstCommonStep, $youPath);
        $this->debug("Number of orbital transfers from YOU to {$firstCommonStep}: {$youOrbitalTransfers}");
        $sanOrbitalTransfers = array_search($firstCommonStep, $sanPath);
        $this->debug("Number of orbital transfers from SAN to {$firstCommonStep}: {$sanOrbitalTransfers}");
        $this->debug('');

        $totalOrbitalTransfers = $youOrbitalTransfers + $sanOrbitalTransfers;
        $this->debug("Total number of orbital transfers from YOU via {$firstCommonStep} to SAN: {$youOrbitalTransfers} + {$sanOrbitalTransfers} = {$totalOrbitalTransfers}");
        $this->debug('');

        $this->setPuzzleAnswer((string)$totalOrbitalTransfers);

        return $this;
    }
}
