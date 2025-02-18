<?php
declare(strict_types=1);

namespace App\AocTasks\Year2019;

use NorthernBytes\AocHelper\Puzzle;
use thiagoalessio\TesseractOCR\TesseractOCR;

class Day8Part2 extends Puzzle
{
    protected string $puzzleName = 'Space Image Format';

    protected string $puzzleAnswerDescription = 'Message produced after decoding the image';

    public function solve(): Puzzle
    {
        $inputArray = str_split($this->getPuzzleInput());

        $width = 25;
        $height = 6;
        $layers = array_chunk($inputArray, $width * $height);

        $border = 5;
        $img = imagecreate($width + 2 * $border, $height + 2 * $border);
        $white = imagecolorallocate($img, 255, 255, 255);
        $black = imagecolorallocate($img, 0, 0, 0);

        for ($i = 0; $i < $width * $height; $i++) {
            for ($j = 0; $j < count($layers); $j++) {
                $px_color = $layers[$j][$i];
                if ($px_color != 2) break;
            }

            // Ascii CLI output
            echo ($px_color == 0) ? '  ' : '██';
            if (($i + 1) % $width == 0) echo "\n";

            // Image output
            $x = $i % $width;
            $y = (int)($i / $width);
            $color = ($px_color == 0) ? $white : $black;
            imagesetpixel($img, $x + $border, $y + $border, $color);
        }
        echo "\n";

        $tmpfname = './aoc_d8p2.png';
        imagepng($img, $tmpfname);

        $ocr = new TesseractOCR();
        $ocr->image($tmpfname);
        $ocr->psm(8);
        $ocr->config('tessedit_char_whitelist', 'ABCDEFGHJKLMNOPQRSTUVWXYZ'); // Assuming no I, avoiding misrecognizing J
        $answer = $ocr->run();

        unlink($tmpfname);

        $this->setPuzzleAnswer($answer);

        return $this;
    }
}
