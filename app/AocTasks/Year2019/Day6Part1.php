<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day6Part1 extends Puzzle
{
    protected string $puzzleName = 'Universal Orbit Map';

    protected string $puzzleAnswerDescription = 'The total number of direct and indirect orbits';

    private array $orbitMap = [];
    private array $orbitCounts = [];

    public function solve(): Puzzle
    {
        $inputLines = explode("\n", $this->getPuzzleInput());

        foreach ($inputLines as $inputLine) {
            [$obj1, $obj2] = explode(')', $inputLine);
            $this->orbitMap[$obj2] = $obj1;
        }

        $totalOrbits = 0;
        foreach (array_keys($this->orbitMap) as $obj) {
            $orbits = $this->countOrbits($obj);
            $this->debug("Number of orbits for {$obj}: {$orbits}");
            $totalOrbits += $orbits;
        }
        $this->debug('');

        $this->setPuzzleAnswer((string)$totalOrbits);

        return $this;
    }

    private function countOrbits($object): int
    {
        // Memoization to speed things up significantly
        if (isset($this->orbitCounts[$object])) return $this->orbitCounts[$object];

        $orbitCount = 0;
        if (isset($this->orbitMap[$object])) {
            $orbitCount += 1 + $this->countOrbits($this->orbitMap[$object]);
        }

        // Memoize for later reuse, save CPU cycles
        $this->orbitCounts[$object] = $orbitCount;

        return $orbitCount;
    }
}
