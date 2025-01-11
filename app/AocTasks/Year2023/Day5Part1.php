<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use NorthernBytes\AocHelper\Puzzle;

class Day5Part1 extends Puzzle
{
    protected string $puzzleName = 'If You Give A Seed A Fertilizer';

    protected string $puzzleAnswerDescription = 'Lowest location number';

    public function solve(): Puzzle
    {
        $input = $this->getPuzzleInput();

        $pattern = <<<EOL
        seeds: (?P<seeds>\d.*\d)

        seed-to-soil map:
        (?P<seed_to_soil>[\d\s\n]*)

        soil-to-fertilizer map:
        (?P<soil_to_fertilizer>[\d\s\n]*)

        fertilizer-to-water map:
        (?P<fertilizer_to_water>[\d\s\n]*)

        water-to-light map:
        (?P<water_to_light>[\d\s\n]*)

        light-to-temperature map:
        (?P<light_to_temperature>[\d\s\n]*)

        temperature-to-humidity map:
        (?P<temperature_to_humidity>[\d\s\n]*)

        humidity-to-location map:
        (?P<humidity_to_location>[\d\s\n]*)
        EOL;

        preg_match_all('/'.$pattern.'/', $input, $matches);

        $seeds = explode(' ', $matches['seeds'][0]);

        $map_types = [
            'seed_to_soil',
            'soil_to_fertilizer',
            'fertilizer_to_water',
            'water_to_light',
            'light_to_temperature',
            'temperature_to_humidity',
            'humidity_to_location',
        ];

        $maps = [];
        foreach($map_types as $map_type) {
            $maps[$map_type] = [];
            $lines = explode("\n", $matches[$map_type][0]);
            foreach ($lines as $line) {
                $parts = explode(' ', $line);
                $dest_range_start = (int)$parts[0];
                $source_range_start = (int)$parts[1];
                $range_length = (int)$parts[2];

                $maps[$map_type][$source_range_start] = [
                    'source_range_start' => $source_range_start,
                    'dest_range_start' => $dest_range_start,
                    'range_length' => $range_length,
                ];
            }
            ksort($maps[$map_type]);
        }

        $this->debug("Input parsed\n");

        $location_numbers = [];
        foreach ($seeds as $i => $seed) {
            $this->debug("Traversing seed number {$i} = {$seed}:");
            $number = (int)$seed;

            foreach($map_types as $map_type) {
                foreach ($maps[$map_type] as $range) {
                    if (($number >= $range['source_range_start']) && ($number <= $range['source_range_start'] + $range['range_length'] - 1)) {
                        $offset = $number - $range['source_range_start'];
                        $dest = $range['dest_range_start'] + $offset;
                        $this->debug("{$map_type}: {$number} maps to {$dest}");
                        $number = $dest;
                        continue 2;
                    }
                }
                $this->debug("{$map_type}: no remapping for {$number}");
            }
            $this->debug("Location number for seed number {$i} = {$number}");
            $location_numbers[$i] = $number;
            $this->debug('');
        }

        $this->setPuzzleAnswer((string)min($location_numbers));

        return $this;
    }
}
