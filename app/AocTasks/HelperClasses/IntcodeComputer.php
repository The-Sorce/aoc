<?php
declare(strict_types=1);

namespace App\AocTasks\HelperClasses;

class IntcodeComputer
{
    const OPCODE_ADD = 1;
    const OPCODE_MULTIPLY = 2;
    const OPCODE_HALT = 99;

    private array $memory = [];
    private int $instructionPointer = 0;

    function __construct(string $memory)
    {
        $this->setMemory($memory);
    }

    public function getMemoryAsArray(): array
    {
        return $this->memory;
    }

    public function getMemoryAsString(): string
    {
        $memoryString = implode(',', $this->memory);
        return $memoryString;
    }

    private function setMemory(string $memory)
    {
        $this->memory = explode(',', $memory);
    }

    public function setMemoryPos(int $position, int $value)
    {
        $this->memory[$position] = $value;
    }

    public function run(): void
    {
        while (true) {
            $opcode = $this->memory[$this->instructionPointer];
            switch ($opcode) {
                case self::OPCODE_ADD:
                    $term1 = $this->memory[$this->memory[++$this->instructionPointer]];
                    $term2 = $this->memory[$this->memory[++$this->instructionPointer]];
                    $sum = $term1 + $term2;
                    $this->memory[$this->memory[++$this->instructionPointer]] = $sum;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_MULTIPLY:
                    $factor1 = $this->memory[$this->memory[++$this->instructionPointer]];
                    $factor2 = $this->memory[$this->memory[++$this->instructionPointer]];
                    $product = $factor1 * $factor2;
                    $this->memory[$this->memory[++$this->instructionPointer]] = $product;
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
