<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day8Part1 extends Puzzle
{
    protected string $puzzleName = 'Space Image Format';

    protected string $puzzleAnswerDescription = 'The number of 1 digits multiplied by the number of 2 digits';

    public function solve(): Puzzle
    {
        $inputArray = str_split($this->getPuzzleInput());
        $layers = array_chunk($inputArray, 25 * 6);

        $zeroesInLayer = [];
        foreach ($layers as $key => $layer) {
            $zeroesInLayer[$key] = count(array_keys($layer, '0'));
        }
        $fewestZeroesInLayer = min($zeroesInLayer);
        $fewestZeroesInLayerKey = array_search($fewestZeroesInLayer, $zeroesInLayer);

        $this->debug("The fewest number of zeroes in a layer: {$fewestZeroesInLayer} (layer id: {$fewestZeroesInLayerKey})");

        $onesInLayer = count(array_keys($layers[$fewestZeroesInLayerKey], '1'));
        $twosInLayer = count(array_keys($layers[$fewestZeroesInLayerKey], '2'));

        $this->debug("The number of 1 digits in the layer: {$onesInLayer}");
        $this->debug("The number of 2 digits in the layer: {$twosInLayer}");

        $answer = $onesInLayer * $twosInLayer;
        $this->setPuzzleAnswer((string)$answer);

        return $this;
    }
}
