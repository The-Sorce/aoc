<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\Grid;
use App\AocTasks\HelperClasses\MultiarrayFunctions;
use App\AocTasks\HelperClasses\IntcodeComputer;
use NorthernBytes\AocHelper\Puzzle;

class Day15Part1 extends Puzzle
{
    protected string $puzzleName = 'Oxygen System';

    protected string $puzzleAnswerDescription = 'The fewest number of movement commands required';

    private IntcodeComputer $computer;
    private Grid $grid;

    private int $steps;

    public function solve(): Puzzle
    {
        // Prevent Xdebug from falsely detecting a "possible infinite loop" due to the recursion in lookAround()
        ini_set('xdebug.max_nesting_level', -1);

        $this->computer = new IntcodeComputer($this->getPuzzleInput());
        $this->computer->setIoMode(IntcodeComputer::IO_MODE_ARRAY_PAUSING);

        $width = 50;
        $height = 50;

        $this->info("Mapping the area using the droid...");

        $this->grid = new Grid();
        $this->grid->setGrid(MultiarrayFunctions::create_multiarray($width, $height, ' '));
        $this->grid->setPos((int)($width / 2), (int)($height / 2));
        $this->grid->setCurCell('S');
        $startPos = $this->grid->getCurCell();

        $this->lookAround();

        echo MultiarrayFunctions::multiarray_to_text($this->grid->getGrid());
        echo "\n";

        $targetPos = $this->grid->findCells('X')[0];

        $this->info("Start pos: {$startPos['x']},{$startPos['y']}, Target pos: {$targetPos['x']},{$targetPos['y']}");
        $this->info("Steps taken from start pos to target pos: {$this->steps}");
        $this->info("");

        $this->setPuzzleAnswer((string)$this->steps);

        return $this;
    }

    private function lookAround($steps = 0) {
        $pos = $this->grid->getPos();
        $this->debug("At pos {$pos['x']},{$pos['y']} looking around...");
        if ($this->grid->getCurCell()['value'] == ' ') {
            $this->grid->setCurCell('?');
        }

        // north (1)
        if ($this->grid->up()['value'] == ' ') {
            $this->computer->addInput(1);
            $this->computer->run();
            $this->grid->moveUp();

            $status = $this->computer->getNextOutput();
            switch ($status) {
                case '0': // The repair droid hit a wall. Its position has not changed.
                    $this->grid->setCurCell('#');
                    break;
                case '2': // The repair droid has moved one step in the requested direction; its new position is the location of the oxygen system.
                    $this->grid->setCurCell('X');
                    $this->steps = $steps + 1;
                case '1': // The repair droid has moved one step in the requested direction.
                    $this->lookAround($steps + 1); // Recursion is one hell of a drug
                    break;
            }

            if ($status !== 0) {
                $this->computer->addInput(2);
                $this->computer->run();
                $this->computer->getNextOutput();
            }
            $this->grid->moveDown();
        }

        // south (2)
        if ($this->grid->down()['value'] == ' ') {
            $this->computer->addInput(2);
            $this->computer->run();
            $this->grid->moveDown();

            $status = $this->computer->getNextOutput();
            switch ($status) {
                case '0': // The repair droid hit a wall. Its position has not changed.
                    $this->grid->setCurCell('#');
                    break;
                case '2': // The repair droid has moved one step in the requested direction; its new position is the location of the oxygen system.
                    $this->grid->setCurCell('X');
                    $this->steps = $steps + 1;
                case '1': // The repair droid has moved one step in the requested direction.
                    $this->lookAround($steps + 1); // Recursion is one hell of a drug
                    break;
            }

            if ($status !== 0) {
                $this->computer->addInput(1);
                $this->computer->run();
                $this->computer->getNextOutput();
            }
            $this->grid->moveUp();
        }

        // west (3)
        if ($this->grid->left()['value'] == ' ') {
            $this->computer->addInput(3);
            $this->computer->run();
            $this->grid->moveLeft();

            $status = $this->computer->getNextOutput();
            switch ($status) {
                case '0': // The repair droid hit a wall. Its position has not changed.
                    $this->grid->setCurCell('#');
                    break;
                case '2': // The repair droid has moved one step in the requested direction; its new position is the location of the oxygen system.
                    $this->grid->setCurCell('X');
                    $this->steps = $steps + 1;
                case '1': // The repair droid has moved one step in the requested direction.
                    $this->lookAround($steps + 1); // Recursion is one hell of a drug
                    break;
            }

            if ($status !== 0) {
                $this->computer->addInput(4);
                $this->computer->run();
                $this->computer->getNextOutput();
            }
            $this->grid->moveRight();
        }

        // east (4)
        if ($this->grid->right()['value'] == ' ') {
            $this->computer->addInput(4);
            $this->computer->run();
            $this->grid->moveRight();

            $status = $this->computer->getNextOutput();
            switch ($status) {
                case '0': // The repair droid hit a wall. Its position has not changed.
                    $this->grid->setCurCell('#');
                    break;
                case '2': // The repair droid has moved one step in the requested direction; its new position is the location of the oxygen system.
                    $this->grid->setCurCell('X');
                    $this->steps = $steps + 1;
                case '1': // The repair droid has moved one step in the requested direction.
                    $this->lookAround($steps + 1); // Recursion is one hell of a drug
                    break;
            }

            if ($status !== 0) {
                $this->computer->addInput(3);
                $this->computer->run();
                $this->computer->getNextOutput();
            }
            $this->grid->moveLeft();
        }

        if ($this->grid->getCurCell()['value'] == '?') {
            $this->grid->setCurCell('.');
        }
    }
}
