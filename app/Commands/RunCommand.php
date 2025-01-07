<?php
declare(strict_types=1);

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

use function Termwind\render;

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

        // Instantiate a class for the correct task
        $className = "App\AocTasks\Day{$day}Part{$part}";
        if (!class_exists($className)) {
            $this->components->error("No task implementation found for day {$day} part {$part}");
            return;
        }
        $task = new $className;
        $dayName = $task->getDayName();
        $partAsText = ($part == 1) ? 'One' : 'Two';
        $dayBanner = "--- Day {$day}: {$dayName} - Part {$partAsText} ---";
        $this->info($dayBanner);
        $this->newLine();

        // Read task input from file
        $inputFile = base_path("/input/d{$day}.data");
        $input = trim(File::get($inputFile));
        $task->setInput($input);

        // Run the actual task
        $task->run();

        // Print the results from the task
        $resultDescription = $task->getResultDescription();
        $result = $task->getResult();
        render(<<<HTML
            <div><i>{$resultDescription}:</i> <b><u>{$result}</u></b></div>
        HTML);
        $this->newLine();

        // Print the duration
        $duration = now()->diff(Carbon::createFromTimestamp(LARAVEL_START))->forHumans(['minimumUnit' => 'ms', 'short' => true, 'parts' => 2]);
        $this->comment("Duration: {$duration}");
    }

    /**
     * Define the command's schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
