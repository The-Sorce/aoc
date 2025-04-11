<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\Grid;
use App\AocTasks\HelperClasses\MultiarrayFunctions;
use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day11Part2 extends Puzzle
{
    protected string $puzzleName = 'Space Police';

    protected string $puzzleAnswerDescription = 'What registration identifier does the robot paint';

    public function solve(): Puzzle
    {
        $computer = new IntcodeComputer($this->getPuzzleInput());

        // Well shit, why didn't I implement this directly in the IntcodeComputer yet...?! FML.
        $ioStreams = [];
        $ioStreams[0] = stream_socket_pair(STREAM_PF_UNIX, STREAM_SOCK_STREAM, STREAM_IPPROTO_IP);
        $ioStreams[1] = stream_socket_pair(STREAM_PF_UNIX, STREAM_SOCK_STREAM, STREAM_IPPROTO_IP);
        $computer->setIoStreams($ioStreams[0][1], $ioStreams[1][0]);
        $computer->runInBackground();

        $posX = 0;
        $posY = 0;
        $direction = 0; // up

        $whitePanels = [];
        $paintedPanels = [];

        // Make the first panel white.
        $whitePanels['0,0'] = true;

        while (true) {
            // Color of current panel (0 = black, 1 = white)
            $curPanelColor = (int)isset($whitePanels["{$posX},{$posY}"]);

            $this->debug("Current panel: {$posX},{$posY}, color: {$curPanelColor}, direction: {$direction}");

            //$computer->addInput($curPanelColor);
            fwrite($ioStreams[0][0], "{$curPanelColor},"); // TODO: Fix later...

            //$output = $computer->getNextOutput();
            $newPanelColor = (int)stream_get_line($ioStreams[1][1], 0, ',');
            $newDirection = (int)stream_get_line($ioStreams[1][1], 0, ',');

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

            // Lol this infinite loop is good times. Remove this when solved.
            $this->debug("Painted panels so far: " . count($paintedPanels));
            if (count($paintedPanels) == 93) break;
        }

        $minX = 0;
        $minY = 0;
        $maxX = 0;
        $maxY = 0;
        foreach (array_keys($whitePanels) as $key) {
            [$x, $y] = explode(',', $key);
            $x = (int)$x;
            $y = (int)$y;
            $minX = min($minX, $x);
            $minY = min($minY, $y);
            $maxX = max($maxX, $x);
            $maxY = max($maxY, $y);
        }
        $this->debug("X = [{$minX}..{$maxX}], Y = [{$minY}..{$maxY}]");
        $offsetX = $minX < 0 ? abs($minX) : 0;
        $offsetY = $minY < 0 ? abs($minY) : 0;
        $this->debug("Offset coordinates by x = {$offsetX}, y = {$offsetY}");
        $sizeX = $maxX + $offsetX;
        $sizeY = $maxY + $offsetY;
        $visualization = [];
        for ($y = 0; $y < $sizeY; $y++) {
            $row = [];
            for ($x = 0; $x < $sizeX; $x++) {
                $row[] = ' ';
            }
            $visualization[] = $row;
        }

        $grid = new Grid();
        $grid->setGrid($visualization);

        foreach (array_keys($whitePanels) as $key) {
            [$x, $y] = explode(',', $key);
            $x = (int)$x + $offsetX;
            $y = (int)$y + $offsetY;
            $grid->setCell($x, $y, "X");
        }

        echo "\n\n\n";
        echo MultiarrayFunctions::multiarray_to_text($grid->getGrid());
        echo "\n\n\n";


        $this->setPuzzleAnswer((string)count($paintedPanels));

        return $this;
    }
}
