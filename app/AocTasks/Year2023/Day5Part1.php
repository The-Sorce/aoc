<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day5Part1 extends AocTask
{
    protected $dayName = 'If You Give A Seed A Fertilizer';

    public function run(): AocTask
    {
        $input = $this->getInput();

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

        echo "Input parsed.\n\n";

        $location_numbers = [];
        foreach ($seeds as $i => $seed) {
            echo "Traversing seed number {$i} = {$seed}:\n";
            $number = (int)$seed;

            foreach($map_types as $map_type) {
                foreach ($maps[$map_type] as $range) {
                    if (($number >= $range['source_range_start']) && ($number <= $range['source_range_start'] + $range['range_length'] - 1)) {
                        $offset = $number - $range['source_range_start'];
                        $dest = $range['dest_range_start'] + $offset;
                        echo "{$map_type}: {$number} maps to {$dest}\n";
                        $number = $dest;
                        continue 2;
                    }
                }
                echo "{$map_type}: no remapping for {$number}\n";
            }
            echo "Location number for seed number {$i} = {$number}\n";
            $location_numbers[$i] = $number;
            echo "\n";
        }

        $this->setResultDescription('Lowest location number');
        $this->setResult((string)min($location_numbers));

        return $this;
    }
}
