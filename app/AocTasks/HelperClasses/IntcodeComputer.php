<?php

namespace App\AocTasks\HelperClasses;

class IntcodeComputer
{
    const OPCODE_ADD = 1;
    const OPCODE_MULTIPLY = 2;
    const OPCODE_HALT = 99;

    private array $state = [];
    private int $instructionPointer = 0;

    function __construct(string $state)
    {
        $this->setState($state);
    }

    public function getStateAsArray(): array
    {
        return $this->state;
    }

    public function getStateAsString(): string
    {
        $stateString = implode(',', $this->state);
        return $stateString;
    }

    private function setState(string $state)
    {
        $this->state = explode(',', $state);
    }

    public function setStatePos(int $position, int $value)
    {
        $this->state[$position] = $value;
    }

    public function run(): void
    {
        while (true) {
            $opcode = $this->state[$this->instructionPointer];
            switch ($opcode) {
                case self::OPCODE_ADD:
                    $term1 = $this->state[$this->state[++$this->instructionPointer]];
                    $term2 = $this->state[$this->state[++$this->instructionPointer]];
                    $sum = $term1 + $term2;
                    $this->state[$this->state[++$this->instructionPointer]] = $sum;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_MULTIPLY:
                    $factor1 = $this->state[$this->state[++$this->instructionPointer]];
                    $factor2 = $this->state[$this->state[++$this->instructionPointer]];
                    $product = $factor1 * $factor2;
                    $this->state[$this->state[++$this->instructionPointer]] = $product;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_HALT:
                    return;
                    break;
                default:
                    throw new \Exception("Invalid opcode: {$opcode}");
            }
        }
    }
}
