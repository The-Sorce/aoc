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

}