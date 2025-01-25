<?php
declare(strict_types=1);

namespace App\AocTasks\HelperClasses;

class IntcodeComputer
{
    const OPCODE_ADD = 1;
    const OPCODE_MULTIPLY = 2;
    const OPCODE_INPUT = 3;
    const OPCODE_OUTPUT = 4;
    const OPCODE_JMPT = 5;
    const OPCODE_JMPF = 6;
    const OPCODE_LT = 7;
    const OPCODE_EQ = 8;
    const OPCODE_HALT = 99;

    const PARAMETER_MODE_POSITION = 0;
    const PARAMETER_MODE_IMMEDIATE = 1;

    private array $memory = [];
    private int $instructionPointer = 0;

    private array $input = [];
    private array $output = [];

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

    public function addInput(int $input): void
    {
        $this->input[] = $input;
    }

    public function getOutputAsArray(): array
    {
        return $this->output;
    }

    public function getOutputAsString(): string
    {
        $outputString = implode(',', $this->output);
        return $outputString;
    }

    private function nextParameterValue(int &$parameterModes): int
    {
        $parameterMode = $parameterModes % 10;
        $parameterModes = (int)($parameterModes / 10);

        $this->instructionPointer++;
        switch ($parameterMode) {
            case self::PARAMETER_MODE_POSITION:
                $position = $this->memory[$this->instructionPointer];
                return $this->memory[$position];
                break;
            case self::PARAMETER_MODE_IMMEDIATE:
                $value = $this->memory[$this->instructionPointer];
                return $value;
                break;
            default:
                throw new \Exception("Invalid parameter mode: {$parameterMode}");
        }
    }

    public function run(): void
    {
        while (true) {
            $opcodeValue = $this->memory[$this->instructionPointer];
            $parameterModes = (int)($opcodeValue / 100);
            $opcode = $opcodeValue % 100;
            switch ($opcode) {
                case self::OPCODE_ADD:
                    $term1 = $this->nextParameterValue($parameterModes);
                    $term2 = $this->nextParameterValue($parameterModes);
                    $sum = $term1 + $term2;
                    $resultPosition = $this->memory[++$this->instructionPointer];
                    $this->memory[$resultPosition] = $sum;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_MULTIPLY:
                    $factor1 = $this->nextParameterValue($parameterModes);
                    $factor2 = $this->nextParameterValue($parameterModes);
                    $product = $factor1 * $factor2;
                    $resultPosition = $this->memory[++$this->instructionPointer];
                    $this->memory[$resultPosition] = $product;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_INPUT:
                    $inputPosition = $this->memory[++$this->instructionPointer];
                    $inputValue = array_shift($this->input);
                    if (is_null($inputValue)) {
                        throw new \Exception('Missing input');
                    }
                    $this->memory[$inputPosition] = $inputValue;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_OUTPUT:
                    $output = $this->nextParameterValue($parameterModes);
                    $this->output[] = $output;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_JMPT:
                    $param1 = $this->nextParameterValue($parameterModes);
                    $param2 = $this->nextParameterValue($parameterModes);
                    if ($param1 !== 0) {
                        $this->instructionPointer = $param2;
                        break;
                    }
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_JMPF:
                    $param1 = $this->nextParameterValue($parameterModes);
                    $param2 = $this->nextParameterValue($parameterModes);
                    if ($param1 === 0) {
                        $this->instructionPointer = $param2;
                        break;
                    }
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_LT:
                    $param1 = $this->nextParameterValue($parameterModes);
                    $param2 = $this->nextParameterValue($parameterModes);
                    $result = (int)($param1 < $param2);
                    $resultPosition = $this->memory[++$this->instructionPointer];
                    $this->memory[$resultPosition] = $result;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_EQ:
                    $param1 = $this->nextParameterValue($parameterModes);
                    $param2 = $this->nextParameterValue($parameterModes);
                    $result = (int)($param1 === $param2);
                    $resultPosition = $this->memory[++$this->instructionPointer];
                    $this->memory[$resultPosition] = $result;
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
