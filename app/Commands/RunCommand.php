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

        $class_name = "App\AocTasks\Day{$day}Part{$part}";
        if (!class_exists($class_name)) {
            $this->error("No task implementation found for day {$day} part {$part}");
        }

        $this->info("Initializing task for day {$day} part {$part}");
        $task = new $class_name;

        // TODO: Run the task here...
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
