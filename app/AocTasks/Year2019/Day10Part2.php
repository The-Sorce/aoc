<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use App\AocTasks\HelperClasses\Grid;
use App\AocTasks\HelperClasses\MultiarrayFunctions;
use NorthernBytes\AocHelper\Puzzle;

class Day10Part2 extends Puzzle
{
    protected string $puzzleName = 'Monitoring Station';

    protected string $puzzleAnswerDescription = '200th asteroid to be vaporized';

    public array $vaporizedAsteroids = [];

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $inputArray = MultiarrayFunctions::text_to_multiarray($input);

        $grid = new Grid();
        $grid->setGrid($inputArray);

        // Use part 1 to determine the best asteroid
        $part1 = new Day10Part1();
        $part1->setPuzzleInput($input)->solve();
        $bestAst = $part1->bestAsteroid;
        $grid->setCell($bestAst['x'], $bestAst['y'], 'X');

        $asteroids = $grid->findCells('#');
        $this->debug('Found ' . count($asteroids) . ' asteroids to vaporize');
        $this->debug('');

        $asteroidsToVaporize = [];

        foreach ($asteroids as $ast) {
            $distX = $ast['x'] - $bestAst['x'];
            $distY = $ast['y'] - $bestAst['y'];
            $gcd = gmp_gcd($distX, $distY);
            $angleX = (int)($distX / $gcd);
            $angleY = (int)($distY / $gcd);

            $distance = abs($distX) + abs($distY);
            $deg = round(rad2deg(atan2($angleX, -$angleY)) * 100 + 36000) % 36000;

            $this->debug("Looking at asteroid at {$ast['x']},{$ast['y']} (distance {$distance} at " . $deg / 100 . " degrees)");

            if (!isset($asteroidsToVaporize[$deg])) $asteroidsToVaporize[$deg] = [];
            $asteroidsToVaporize[$deg][$distance] = $ast;
        }
        $this->debug('');

        // Sort asteroid list in angle (deg) and distance order
        ksort($asteroidsToVaporize);
        foreach (array_keys($asteroidsToVaporize) as $key) {
            ksort($asteroidsToVaporize[$key]);
        }

        $vaporizedAsteroidsNum = 0;

        // Vaporize asteroids in order
        while(!empty($asteroidsToVaporize)) {
            foreach (array_keys($asteroidsToVaporize) as $deg) {
                $ast = array_shift($asteroidsToVaporize[$deg]);
                $this->vaporizedAsteroids[++$vaporizedAsteroidsNum] = $ast;
                $this->debug("The #{$vaporizedAsteroidsNum} asteroid to be vaporized is at {$ast['x']},{$ast['y']}.");

                if (count($asteroidsToVaporize[$deg]) == 0) unset($asteroidsToVaporize[$deg]);
            }
        }
        $this->debug('');

        if (!isset($this->vaporizedAsteroids[200])) {
            $answer = 'none';
        } else {
            $answer = (string)(100 * $this->vaporizedAsteroids[200]['x'] + $this->vaporizedAsteroids[200]['y']);
        }
        $this->setPuzzleAnswer($answer);

        return $this;
    }
}
