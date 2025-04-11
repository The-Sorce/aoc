<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\Grid;
use App\AocTasks\HelperClasses\MultiarrayFunctions;
use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day13Part2 extends Puzzle
{
    protected string $puzzleName = 'Care Package';

    protected string $puzzleAnswerDescription = 'What is your score after the last block is broken';

    public function solve(): Puzzle
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());
        $computer->setIoMode(IntcodeComputer::IO_MODE_ARRAY_PAUSING);
        
        // Memory address 0 represents the number of quarters that have been inserted; set it to 2 to play for free.
        $computer->setMemoryPos(0, 2);

        $score = 0;

        $ballPosX = -1;
        $paddlePosX = -1;

        $firstIteration = true;

        while (!$computer->hasHalted()) {
            $this->debug("Ball pos = {$ballPosX}, Paddle pos = {$paddlePosX}");

            if ($paddlePosX < $ballPosX) {
                $input = 1;
            } elseif ($paddlePosX == $ballPosX) {
                $input = 0;
            } else {
                $input = -1;
            }
            $computer->addInput($input);
            $computer->run();

            $outputArray = $computer->getOutputAsArray(true);
            $xPosArray = [];
            $yPosArray = [];
            $tileIdArray = [];
            while (!empty($outputArray)) {
                $xPosArray[] = array_shift($outputArray);
                $yPosArray[] = array_shift($outputArray);
                $tileIdArray[] = array_shift($outputArray);
            }

            if ($firstIteration) {
                $width = max($xPosArray) + 1;
                $height = max($yPosArray) + 1;
                $this->debug("Screen size is {$width} x {$height}");
                $this->debug("");
                $grid = new Grid();
                $grid->setGrid(MultiarrayFunctions::create_multiarray($width, $height, ' '));
                $firstIteration = false;
            }

            foreach (array_keys($xPosArray) as $i) {
                $xPos = $xPosArray[$i];
                $yPos = $yPosArray[$i];
                $tileId = $tileIdArray[$i];

                if ($xPos == -1 && $yPos == 0) {
                    $score = $tileId;
                    continue;
                }

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
                        $paddlePosX = $xPos;
                        break;
                    case 4: // ball tile
                        $value = 'O';
                        $ballPosX = $xPos;
                        break;
                    default:
                        throw new \Exception("Invalid tile id: {$tileId}");
                }

                $grid->setCell($xPos, $yPos, $value);
            }

            echo MultiarrayFunctions::multiarray_to_text($grid->getGrid());
            echo "\n";
            echo "Current score is {$score}\n";
            echo "\n";

            //usleep(1000);
        }

        $this->setPuzzleAnswer((string)$score);

        return $this;
    }
}
