<?php
declare(strict_types=1);

namespace App\AocTasks\Year2015;

use NorthernBytes\AocHelper\Puzzle;

class Day7Part1 extends Puzzle
{
    protected string $puzzleName = 'Some Assembly Required';

    protected string $puzzleAnswerDescription = 'Signal provided to wire a';

    private array $wires = [];
    private array $wiresMemoized = [];

    public function solve(): Puzzle
    {
        $inputArray = explode("\n", $this->getPuzzleInput());

        foreach ($inputArray as $wireDefinition) {
            $parts = explode(' -> ', $wireDefinition);
            $this->wires[$parts[1]] = $parts[0];
        }

        $this->setPuzzleAnswer((string)$this->getSignalForWire('a'));

        return $this;
    }

    public function getSignalForWire(string $wireIdentifier): int
    {
        // Memoization makes things fast!
        if (isset($this->wiresMemoized[$wireIdentifier])) return $this->wiresMemoized[$wireIdentifier];

        // This is here simply to make test cases not crash, when there is no wire 'a'
        if (!isset($this->wires[$wireIdentifier])) return -1;

        $wireDefinition = $this->wires[$wireIdentifier];

        // Digits only, literal
        if (preg_match('/^[0-9]*$/', $wireDefinition)) {
            $result = (int)$wireDefinition;
            $this->wiresMemoized[$wireIdentifier] = $result;
            return $result;
        }

        // Letters only, other wire
        if (preg_match('/^[a-z]*$/', $wireDefinition)) {
            $result = $this->getSignalForWire($wireDefinition);
            $this->wiresMemoized[$wireIdentifier] = $result;
            return $result;
        }

        // Bitwise AND
        if (preg_match('/^(.*) AND (.*)$/', $wireDefinition, $matches)) {
            $op1 = preg_match('/^[0-9]*$/', $matches[1]) ? (int)$matches[1] : $this->getSignalForWire($matches[1]);
            $op2 = preg_match('/^[0-9]*$/', $matches[2]) ? (int)$matches[2] : $this->getSignalForWire($matches[2]);
            $result = $op1 & $op2;
            $this->wiresMemoized[$wireIdentifier] = $result;
            return $result;
        }

        // Bitwise OR
        if (preg_match('/^(.*) OR (.*)$/', $wireDefinition, $matches)) {
            $op1 = preg_match('/^[0-9]*$/', $matches[1]) ? (int)$matches[1] : $this->getSignalForWire($matches[1]);
            $op2 = preg_match('/^[0-9]*$/', $matches[2]) ? (int)$matches[2] : $this->getSignalForWire($matches[2]);
            $result = $op1 | $op2;
            $this->wiresMemoized[$wireIdentifier] = $result;
            return $result;
        }

        // Bitwise NOT
        if (preg_match('/^NOT (.*)$/', $wireDefinition, $matches)) {
            $op = preg_match('/^[0-9]*$/', $matches[1]) ? (int)$matches[1] : $this->getSignalForWire($matches[1]);
            $result = ~ $op;
            if ($result < 0) $result += 65536;
            $this->wiresMemoized[$wireIdentifier] = $result;
            return $result;
        }

        // Left-shift
        if (preg_match('/^(.*) LSHIFT (.*)$/', $wireDefinition, $matches)) {
            $op1 = preg_match('/^[0-9]*$/', $matches[1]) ? (int)$matches[1] : $this->getSignalForWire($matches[1]);
            $op2 = preg_match('/^[0-9]*$/', $matches[2]) ? (int)$matches[2] : $this->getSignalForWire($matches[2]);
            $result = $op1 << $op2;
            $this->wiresMemoized[$wireIdentifier] = $result;
            return $result;
        }

        // Right-shift
        if (preg_match('/^(.*) RSHIFT (.*)$/', $wireDefinition, $matches)) {
            $op1 = preg_match('/^[0-9]*$/', $matches[1]) ? (int)$matches[1] : $this->getSignalForWire($matches[1]);
            $op2 = preg_match('/^[0-9]*$/', $matches[2]) ? (int)$matches[2] : $this->getSignalForWire($matches[2]);
            $result = $op1 >> $op2;
            $this->wiresMemoized[$wireIdentifier] = $result;
            return $result;
        }

        throw new \Exception("Unexpected operator or operands");
    }
}
