<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class RunCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run
                            {day : The day (1-25) of the task (required)}
                            {part : The part (1-2) of the task (required)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the task for a specified day and part';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $day = $this->argument('day');
        $part = $this->argument('part');

        $className = "App\AocTasks\Day{$day}Part{$part}";
        if (!class_exists($className)) {
            $this->error("No task implementation found for day {$day} part {$part}");
            return;
        }

        $task = new $className;
        $dayName = $task->getDayName();
        $partAsText = ($part == 1) ? 'One' : 'Two';
        $dayBanner = "--- Day {$day}: {$dayName} - Part {$partAsText} ---";
        $this->info($dayBanner);

        // Read input from file
        $inputFile = __DIR__ . "/../../input/d{$day}.data";
        $input = trim(file_get_contents($inputFile));
        $task->setInput($input);

        $task->run();

        $resultDescription = $task->getResultDescription();
        $result = $task->getResult();
        $this->info("{$resultDescription}: {$result}");
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
