<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;

class Day12Part2 extends Puzzle
{
    protected string $puzzleName = 'The N-Body Problem';

    protected string $puzzleAnswerDescription = 'How many steps does it take to reach the first state that exactly matches a previous state';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $pattern = <<<EOL
        <x=(?P<pos_x>-?\d+), y=(?P<pos_y>-?\d+), z=(?P<pos_z>-?\d+)>
        EOL;

        preg_match_all("/{$pattern}/", $input, $matches);

        $moons = [
            'x' => [],
            'y' => [],
            'z' => [],
        ];
        foreach (array_keys($matches[0]) as $i) {
            $moons['x'][] = [
                'pos' => (int)$matches['pos_x'][$i],
                'vel' => 0,
            ];
            $moons['y'][] = [
                'pos' => (int)$matches['pos_y'][$i],
                'vel' => 0,
            ];
            $moons['z'][] = [
                'pos' => (int)$matches['pos_z'][$i],
                'vel' => 0,
            ];
        }

        $this->debug("Parsed " . count($moons['x']) . " moons from given input");
        $this->debug("");

        $originalMoons = $moons;
        $axisCyclePeriods = [];

        $step = 0;
        while (true) {
            $step++;
            $this->debug("Simulating time step {$step}");

            // Apply gravity
            for ($i = 0; $i < count($moons['x']); $i++) {
                for ($j = $i+1; $j < count($moons['x']); $j++) {
                    foreach (['x', 'y', 'z'] as $axis) {
                        if ($moons[$axis][$i]['pos'] < $moons[$axis][$j]['pos']) {
                            $moons[$axis][$i]['vel']++;
                            $moons[$axis][$j]['vel']--;
                        } elseif ($moons[$axis][$i]['pos'] > $moons[$axis][$j]['pos']) {
                            $moons[$axis][$i]['vel']--;
                            $moons[$axis][$j]['vel']++;
                        }
                    }
                }
            }

            // Apply velocity
            for ($i = 0; $i < count($moons['x']); $i++) {
                foreach (['x', 'y', 'z'] as $axis) {
                    $moons[$axis][$i]['pos'] += $moons[$axis][$i]['vel'];
                }
            }

            if (!isset($axisCyclePeriods['x']) && $moons['x'] == $originalMoons['x']) {
                $axisCyclePeriods['x'] = $step;
                $this->info("Axis x is cyclic with a period of {$step}");
            }
            if (!isset($axisCyclePeriods['y']) && $moons['y'] == $originalMoons['y']) {
                $axisCyclePeriods['y'] = $step;
                $this->info("Axis y is cyclic with a period of {$step}");
            }
            if (!isset($axisCyclePeriods['z']) && $moons['z'] == $originalMoons['z']) {
                $axisCyclePeriods['z'] = $step;
                $this->info("Axis z is cyclic with a period of {$step}");
            }
            
            if (count($axisCyclePeriods) == 3) break;
        }
        $this->info("");

        $lcm = gmp_lcm($axisCyclePeriods['x'], gmp_lcm($axisCyclePeriods['y'], $axisCyclePeriods['z']));
        $this->info("Least Common Multiple (LCM) of the axis cycle periods is {$lcm}");
        $this->info("");

        $this->setPuzzleAnswer((string)$lcm);

        return $this;
    }
}
