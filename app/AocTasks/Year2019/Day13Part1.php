<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\Grid;
use App\AocTasks\HelperClasses\MultiarrayFunctions;
use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day13Part1 extends Puzzle
{
    protected string $puzzleName = 'Care Package';

    protected string $puzzleAnswerDescription = 'How many block tiles are on the screen when the game exits';

    public function solve(): Puzzle
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());
        $computer->run();

        $outputArray = $computer->getOutputAsArray();
        $xPosArray = [];
        $yPosArray = [];
        $tileIdArray = [];
        while (!empty($outputArray)) {
            $xPosArray[] = array_shift($outputArray);
            $yPosArray[] = array_shift($outputArray);
            $tileIdArray[] = array_shift($outputArray);
        }

        $width = max($xPosArray) + 1;
        $height = max($yPosArray) + 1;
        $this->debug("Screen size is {$width} x {$height}");
        $this->debug("");
        $grid = new Grid();
        $grid->setGrid(MultiarrayFunctions::create_multiarray($width, $height, ' '));

        foreach (array_keys($xPosArray) as $i) {
            $xPos = $xPosArray[$i];
            $yPos = $yPosArray[$i];
            $tileId = $tileIdArray[$i];

            switch ($tileId) {
                case 0: // empty tile
                    $value = ' ';
                    break;
                case 1: // wall tile
                    $value = '#';
                    break;
                case 2: // block tile
                    $value = '█';
                    break;
                case 3: // horizontal paddle tile
                    $value = '=';
                    break;
                case 4: // ball tile
                    $value = 'O';
                    break;
                default:
                    throw new \Exception("Invalid tile id: {$tileId}");
            }

            $grid->setCell($xPos, $yPos, $value);
        }

        echo MultiarrayFunctions::multiarray_to_text($grid->getGrid());
        echo "\n";

        $blockTileCount = count($grid->findCells('█'));

        $this->setPuzzleAnswer((string)$blockTileCount);

        return $this;
    }
}
