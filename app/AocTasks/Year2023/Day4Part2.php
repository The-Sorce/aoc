<?php
declare(strict_types=1);

namespace App\AocTasks\Year2023;

use App\AocTasks\AocTask;

class Day4Part2 extends AocTask
{
    protected $dayName = 'Scratchcards';

    public function run(): AocTask
    {
        function getCardInstances($card_number, &$cards_array) {
            return $cards_array[$card_number];
        }

        function addCardInstances($card_number, $amount, &$cards_array) {
            if (isset($cards_array[$card_number])) {
                $cards_array[$card_number] += $amount;
            } else {
                $cards_array[$card_number] = $amount;
            }
        }

        $input = $this->getInput();

        preg_match_all('/Card +(\d+): +(\d.*\d) \| +(\d.*\d)/', $input, $matches);

        $no_scratchcards_total = 0;
        $card_instance_counters = [];
        foreach ($matches[1] as $i => $card_number) {
            addCardInstances($card_number, 1, $card_instance_counters);
            $winning_numbers = explode(' ', str_replace('  ', ' ', $matches[2][$i]));
            $numbers_held = explode(' ', str_replace('  ', ' ', $matches[3][$i]));
            $winning_numbers_held = array_intersect($numbers_held, $winning_numbers);
            $card_instances = getCardInstances($card_number, $card_instance_counters);
            for ($j = 1; $j <= count($winning_numbers_held); $j++) {
                addCardInstances($card_number + $j, $card_instances, $card_instance_counters);
            }
            echo "Card {$card_number} ({$card_instances} instances) has " . count($winning_numbers_held) . " winning numbers.\n";
            $no_scratchcards_total += $card_instances;
        }
        echo "\n";

        $this->setResultDescription('Number of scratchcards held in total');
        $this->setResult((string)$no_scratchcards_total);

        return $this;
    }
}
