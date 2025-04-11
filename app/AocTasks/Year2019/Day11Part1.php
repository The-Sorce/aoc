<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day11Part1 extends Puzzle
{
    protected string $puzzleName = 'Space Police';

    protected string $puzzleAnswerDescription = 'How many panels does it paint at least once';

    public function solve(): Puzzle
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());
        $computer->setIoMode(IntcodeComputer::IO_MODE_ARRAY_PAUSING);

        $posX = 0;
        $posY = 0;
        $direction = 0; // up

        $whitePanels = [];
        $paintedPanels = [];

        while (!$computer->hasHalted()) {
            // Color of current panel (0 = black, 1 = white)
            $curPanelColor = (int)isset($whitePanels["{$posX},{$posY}"]);

            $this->debug("Current panel: {$posX},{$posY}, color: {$curPanelColor}, direction: {$direction}");

            $computer->addInput($curPanelColor);
            $computer->run();

            $newPanelColor = $computer->getNextOutput();
            $newDirection = $computer->getNextOutput();

            $this->debug("New panel color: {$newPanelColor}, new direction: {$newDirection}");

            if ($curPanelColor != $newPanelColor) {
                if ($newPanelColor == 1) {
                    $whitePanels["{$posX},{$posY}"] = true;
                } else {
                    unset($whitePanels["{$posX},{$posY}"]);
                }
                $paintedPanels["{$posX},{$posY}"] = true;
                $this->debug("Panel {$posX},{$posY} got painted.");
            }

            // Calculate new direction
            switch ($newDirection) {
                case 0:
                    // Turn left 90 degrees, but easier to turn right 270 degrees
                    $direction += 270;
                    break;
                case 1:
                    // Turn right 90 degrees
                    $direction += 90;
                    break;
                default:
                    throw new \Exception("Unexpected new direction: {$newDirection}");
            }
            $direction %= 360;

            // Move
            switch ($direction) {
                case 0:
                    $posY--;
                    break;
                case 90:
                    $posX++;
                    break;
                case 180:
                    $posY++;
                    break;
                case 270:
                    $posX--;
                    break;
                default:
                throw new \Exception("Unexpected direction: {$direction}");
            }
        }

        $this->setPuzzleAnswer((string)count($paintedPanels));

        return $this;
    }
}
