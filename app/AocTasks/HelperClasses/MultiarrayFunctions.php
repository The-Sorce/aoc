<?php
declare(strict_types=1);

namespace App\AocTasks\HelperClasses;

class MultiarrayFunctions
{

        public static function text_to_multiarray($input): array
        {
                $output = explode("\n", $input);
                foreach ($output as $x => $row) {
                        $output[$x] = str_split($row);
                }
                return $output;
        }

        public static function multiarray_to_text($input): string
        {
                $output = '';
                foreach ($input as $row) {
                        $output .= implode('', $row) . "\n";
                }
                return $output;
        }

        public static function create_multiarray($width, $height, $value = ' '): array
        {
                $multiarray = [];
                for ($y = 0; $y < $height; $y++) {
                        $row = [];
                        for ($x = 0; $x < $width; $x++) {
                                $row[] = $value;
                        }
                        $multiarray[] = $row;
                }
                return $multiarray;
        }

}
