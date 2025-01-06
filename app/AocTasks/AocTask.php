<?php

namespace App\AocTasks;

class AocTask
{
    /**
     * Name of the task for the day, as given by AoC.
     *
     * @var string
     */
    protected $dayName = '';


    public function getDayName()
    {
        return $this->dayName;
    }
}