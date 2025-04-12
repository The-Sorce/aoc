<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day14Part1 extends Puzzle
{
    protected string $puzzleName = 'Space Stoichiometry';

    protected string $puzzleAnswerDescription = 'The minimum amount of ORE required to produce exactly 1 FUEL';

    private array $dependencyMap = [];
    private array $chemicalBalance = [];
    public int $oreConsumed = 0;

    public function solve(): Puzzle
    {
        $this->debug('Building chemical dependency map');
        foreach (explode("\n", $this->getPuzzleInput()) as $inputRow) {
            [$inputChemicals, $outputChemical] = explode(' => ', $inputRow);

            [$outputChemicalAmount, $outputChemicalType] = explode(' ', $outputChemical);
            $outputChemicalAmount = (int)$outputChemicalAmount;

            $inputArray = [];
            foreach (explode(', ', $inputChemicals) as $inputChemical) {
                [$inputChemicalAmount, $inputChemicalType] = explode(' ', $inputChemical);
                $inputChemicalAmount = (int)$inputChemicalAmount;
                $inputArray[] = [
                    'type' => $inputChemicalType,
                    'amount' => $inputChemicalAmount,
                ];
            }

            $this->dependencyMap[$outputChemicalType] = [
                'amount' => $outputChemicalAmount,
                'input' => $inputArray,
            ];

            $this->chemicalBalance[$outputChemicalType] = 0; // Initiate balance, makes life easier for us later
        }
        $this->debug('Built chemical dependency map');

        $this->produceChemical('FUEL', 1);

        $this->setPuzzleAnswer((string)$this->oreConsumed);
        return $this;
    }

    public function produceChemical(string $type, int $amount): void
    {
        $this->debug("Producing {$amount} {$type}...");
        $weight = ceil($amount / $this->dependencyMap[$type]['amount']);
        $actualAmount = (int)($weight * $this->dependencyMap[$type]['amount']);
        foreach ($this->dependencyMap[$type]['input'] as $inputChemical) {
            $weightedAmount = (int)($inputChemical['amount'] * $weight);
            $this->debug("Producing {$amount} {$type} requires {$weightedAmount} {$inputChemical['type']}");
            $this->consumeChemical($inputChemical['type'], $weightedAmount);
        }
        $this->debug("Produced {$actualAmount} {$type}.");
        $this->chemicalBalance[$type] += $actualAmount;
    }

    private function consumeChemical(string $type, int $amount): void
    {
        $this->debug("Consuming {$amount} {$type}");
        if ($type == 'ORE') {
            $this->oreConsumed += $amount;
            return;
        }

        $this->chemicalBalance[$type] -= $amount;

        if ($this->chemicalBalance[$type] < 0) {
            $deficiency = -$this->chemicalBalance[$type];
            $this->debug("We ran out of {$type}, need {$deficiency} more");
            $this->produceChemical($type, $deficiency);
        }
    }
}
