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

    function __construct(string $memory = null)
    {
        if (!is_null($memory)) {
            $this->setMemory($memory);
        }
    }

    public function getInstructionPointer(): int
    {
        return $this->instructionPointer;
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

    public function setMemory(string $memory, bool $resetInstructionPointer = true): void
    {
        $memoryArray = explode(',', $memory);
        $this->memory = [];
        foreach ($memoryArray as $i) {
            $this->memory[] = (int)$i;
        }

        if ($resetInstructionPointer) {
            $this->instructionPointer = 0;
        }
    }

    public function getMemoryPos(int $position): int
    {
        return $this->memory[$position];
    }

    public function setMemoryPos(int $position, int $value): void
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
