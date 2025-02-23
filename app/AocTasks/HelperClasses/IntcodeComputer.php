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
    const OPCODE_RELBASEOFFSET = 9;
    const OPCODE_HALT = 99;

    const PARAMETER_MODE_POSITION = 0;
    const PARAMETER_MODE_IMMEDIATE = 1;
    const PARAMETER_MODE_RELATIVE = 2;

    const IO_MODE_ARRAY = 0;
    const IO_MODE_STREAM = 1;

    private array $memory = [];
    private int $instructionPointer = 0;

    private int $relativeBase = 0;

    private int $ioMode = self::IO_MODE_ARRAY;

    private array $inputArray = [];
    private array $outputArray = [];

    private mixed $inputStream;
    private mixed $outputStream;

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
        if (!isset($this->memory[$position])) return 0;
        return $this->memory[$position];
    }

    public function setMemoryPos(int $position, int $value): void
    {
        $this->memory[$position] = $value;
    }

    public function setIoStreams(mixed $inputStream, mixed $outputStream): void
    {
        $this->ioMode = self::IO_MODE_STREAM;

        $this->inputStream = $inputStream;
        $this->outputStream = $outputStream;
    }

    public function addInput(int $input): void
    {
        switch ($this->ioMode) {
            case self::IO_MODE_ARRAY:
                $this->inputArray[] = $input;
                return;
                break;
            case self::IO_MODE_STREAM:
                throw new \Exception("addInput() is not supported in STREAM I/O mode");
                break;
            default:
               throw new \Exception("Invalid I/O mode: {$this->ioMode}");
        }
    }

    public function getOutputAsArray(): array
    {
        return $this->outputArray;
    }

    public function getOutputAsString(): string
    {
        $outputString = implode(',', $this->outputArray);
        return $outputString;
    }

    private function readInput(): int
    {
        switch ($this->ioMode) {
            case self::IO_MODE_ARRAY:
                $inputValue = array_shift($this->inputArray);
                if (is_null($inputValue)) {
                    throw new \Exception('Missing input');
                }
                return $inputValue;
                break;
            case self::IO_MODE_STREAM:
                $rawInput = stream_get_line($this->inputStream, 0, ',');
                $inputValue = (int)$rawInput;
                return $inputValue;
                break;
            default:
               throw new \Exception("Invalid I/O mode: {$this->ioMode}");
        }
    }

    private function writeOutput(int $output): void
    {
        switch ($this->ioMode) {
            case self::IO_MODE_STREAM:
                fwrite($this->outputStream, "{$output},");
            case self::IO_MODE_ARRAY:
                $this->outputArray[] = $output;
                return;
                break;
            default:
                throw new \Exception("Invalid I/O mode: {$this->ioMode}");
        }
    }

    public function getRelativeBase(): int
    {
        return $this->relativeBase;
    }

    public function adjustRelativeBase(int $offset): void
    {
        $this->relativeBase += $offset;
    }

    private function nextInputParameterValue(int &$parameterModes): int
    {
        $parameterMode = $parameterModes % 10;
        $parameterModes = (int)($parameterModes / 10);

        $this->instructionPointer++;
        switch ($parameterMode) {
            case self::PARAMETER_MODE_POSITION:
                $position = $this->memory[$this->instructionPointer];
                return $this->getMemoryPos($position);
                break;
            case self::PARAMETER_MODE_IMMEDIATE:
                $value = $this->memory[$this->instructionPointer];
                return $value;
                break;
            case self::PARAMETER_MODE_RELATIVE:
                $position = $this->memory[$this->instructionPointer] + $this->relativeBase;
                return $this->getMemoryPos($position);
                break;
            default:
                throw new \Exception("Invalid input parameter mode: {$parameterMode}");
        }
    }

    private function nextOutputParameterPosition(int &$parameterModes): int
    {
        $parameterMode = $parameterModes % 10;
        $parameterModes = (int)($parameterModes / 10);

        $this->instructionPointer++;
        switch ($parameterMode) {
            case self::PARAMETER_MODE_POSITION:
                $position = $this->memory[$this->instructionPointer];
                return $position;
                break;
            case self::PARAMETER_MODE_RELATIVE:
                $position = $this->memory[$this->instructionPointer] + $this->relativeBase;
                return $position;
                break;
            default:
                throw new \Exception("Invalid output parameter mode: {$parameterMode}");
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
                    $term1 = $this->nextInputParameterValue($parameterModes);
                    $term2 = $this->nextInputParameterValue($parameterModes);
                    $sum = $term1 + $term2;
                    $resultPosition = $this->nextOutputParameterPosition($parameterModes);
                    $this->memory[$resultPosition] = $sum;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_MULTIPLY:
                    $factor1 = $this->nextInputParameterValue($parameterModes);
                    $factor2 = $this->nextInputParameterValue($parameterModes);
                    $product = $factor1 * $factor2;
                    $resultPosition = $this->nextOutputParameterPosition($parameterModes);
                    $this->memory[$resultPosition] = $product;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_INPUT:
                    $inputPosition = $this->nextOutputParameterPosition($parameterModes);
                    $inputValue = $this->readInput();
                    $this->memory[$inputPosition] = $inputValue;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_OUTPUT:
                    $output = $this->nextInputParameterValue($parameterModes);
                    $this->writeOutput($output);
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_JMPT:
                    $param1 = $this->nextInputParameterValue($parameterModes);
                    $param2 = $this->nextInputParameterValue($parameterModes);
                    if ($param1 !== 0) {
                        $this->instructionPointer = $param2;
                        break;
                    }
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_JMPF:
                    $param1 = $this->nextInputParameterValue($parameterModes);
                    $param2 = $this->nextInputParameterValue($parameterModes);
                    if ($param1 === 0) {
                        $this->instructionPointer = $param2;
                        break;
                    }
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_LT:
                    $param1 = $this->nextInputParameterValue($parameterModes);
                    $param2 = $this->nextInputParameterValue($parameterModes);
                    $result = (int)($param1 < $param2);
                    $resultPosition = $this->nextOutputParameterPosition($parameterModes);
                    $this->memory[$resultPosition] = $result;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_EQ:
                    $param1 = $this->nextInputParameterValue($parameterModes);
                    $param2 = $this->nextInputParameterValue($parameterModes);
                    $result = (int)($param1 === $param2);
                    $resultPosition = $this->nextOutputParameterPosition($parameterModes);
                    $this->memory[$resultPosition] = $result;
                    $this->instructionPointer++;
                    break;
                case self::OPCODE_RELBASEOFFSET:
                    $offset = $this->nextInputParameterValue($parameterModes);
                    $this->adjustRelativeBase($offset);
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

    public function runInBackground(): void
    {
        $pid = pcntl_fork();
        if ($pid == -1) {
            die('Could not fork');
        } elseif ($pid) {
            // parent process
            return;
        } else {
            // child process
            $this->run();
            exit(0);
        }
    }

}
