<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day12Part1 extends Puzzle
{
    protected string $puzzleName = 'The N-Body Problem';

    protected string $puzzleAnswerDescription = 'The total energy in the system';

    public int $steps = 1000;

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $pattern = <<<EOL
        <x=(?P<pos_x>-?\d+), y=(?P<pos_y>-?\d+), z=(?P<pos_z>-?\d+)>
        EOL;

        preg_match_all("/{$pattern}/", $input, $matches);

        $moons = [];
        foreach (array_keys($matches[0]) as $i) {
            $moons[] = [
                'pos_x' => (int)$matches['pos_x'][$i],
                'pos_y' => (int)$matches['pos_y'][$i],
                'pos_z' => (int)$matches['pos_z'][$i],
                'vel_x' => 0,
                'vel_y' => 0,
                'vel_z' => 0,
            ];
        }

        $this->debug("Parsed " . count($moons) . " moons from given input");
        $this->debug("");

        for ($step = 1; $step <= $this->steps; $step++) {
            $this->debug("Simulating time step {$step}/{$this->steps}");

            // Apply gravity
            for ($i = 0; $i < count($moons); $i++) {
                for ($j = $i+1; $j < count($moons); $j++) {
                    foreach (['x', 'y', 'z'] as $axis) {
                        if ($moons[$i]["pos_{$axis}"] < $moons[$j]["pos_{$axis}"]) {
                            $moons[$i]["vel_{$axis}"]++;
                            $moons[$j]["vel_{$axis}"]--;
                        } elseif ($moons[$i]["pos_{$axis}"] > $moons[$j]["pos_{$axis}"]) {
                            $moons[$i]["vel_{$axis}"]--;
                            $moons[$j]["vel_{$axis}"]++;
                        }
                    }
                }
            }

            // Apply velocity
            for ($i = 0; $i < count($moons); $i++) {
                foreach (['x', 'y', 'z'] as $axis) {
                    $moons[$i]["pos_{$axis}"] += $moons[$i]["vel_{$axis}"];
                }
            }
        }
        $this->debug("");

        // Calculate the total energy in the system
        $this->debug("Calculating the total energy in the system");
        $totalEnergy = 0;
        for ($i = 0; $i < count($moons); $i++) {
            $potentialEnergy = abs($moons[$i]["pos_x"]) + abs($moons[$i]["pos_y"]) + abs($moons[$i]["pos_z"]);
            $kineticEnergy = abs($moons[$i]["vel_x"]) + abs($moons[$i]["vel_y"]) + abs($moons[$i]["vel_z"]);
            $totalEnergy += $potentialEnergy * $kineticEnergy;
        }

        $this->setPuzzleAnswer((string)$totalEnergy);

        return $this;
    }
}
