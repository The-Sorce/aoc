<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\Grid;
use App\AocTasks\HelperClasses\MultiarrayFunctions;
use NorthernBytes\AocHelper\Puzzle;

class Day10Part1 extends Puzzle
{
    protected string $puzzleName = 'Monitoring Station';

    protected string $puzzleAnswerDescription = 'How many other asteroids can be detected from the best location';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $inputArray = MultiarrayFunctions::text_to_multiarray($input);

        $grid = new Grid();
        $grid->setGrid($inputArray);

        $asteroids = $grid->findCells('#');
        $this->debug('Found ' . count($asteroids) . ' asteroids in total');
        $this->debug('');

        $maxVisibleAsteroids = 0;

        foreach ($asteroids as $key => $candAst) {
            $this->debug("Considering candidate asteroid {$key} at {$candAst['x']},{$candAst['y']}");
            $g = clone $grid;
            $g->setCell($candAst['x'], $candAst['y'], 'X');
            $otherAsteroids = $g->findCells('#');
            foreach ($otherAsteroids as $otherAst) {
                $distX = $otherAst['x'] - $candAst['x'];
                $distY = $otherAst['y'] - $candAst['y'];
                $gcd = gmp_gcd($distX, $distY);
                $angleX = (int)($distX / $gcd);
                $angleY = (int)($distY / $gcd);
                $this->debug("Looking at other asteroid at {$otherAst['x']},{$otherAst['y']} (distance {$distX},{$distY}, angle {$angleX},{$angleY})");
                $x = $otherAst['x'] + $angleX;
                $y = $otherAst['y'] + $angleY;
                while (($x >= 0 && $x < $g->width) && ($y >= 0 && $y < $g->height)) {
                    if ($g->getCell($x, $y)['value'] == '#') {
                        $this->debug("Other asteroid blocks sight of third asteroid at {$x},{$y}");
                        $g->setCell($x, $y, 'X');
                    }
                    $x += $angleX;
                    $y += $angleY;
                }
            }
            $visibleAsteroids = count($g->findCells('#'));
            $this->debug("A total of {$visibleAsteroids} visible asteroids from candidate asteroid");
            $this->debug('');
            $maxVisibleAsteroids = max($maxVisibleAsteroids, $visibleAsteroids);
        }

        $this->setPuzzleAnswer((string)$maxVisibleAsteroids);

        return $this;
    }
}
