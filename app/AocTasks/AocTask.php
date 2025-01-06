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

    /**
     * Input data for the task.
     *
     * @var string
     */
    protected $input = null;

    /**
     * Result after the task has been run.
     *
     * @var string
     */
    protected $result = null;

    /**
     * Optional description of the result.
     *
     * @var string
     */
    protected $resultDescription = 'Result';

    /**
     * Constructor, duh.
     *
     */
    function __construct(string $input = null)
    {
        $this->setInput($input);
    }

    /**
     * Gets the name of the task for the day.
     */
    public function getDayName(): string
    {
        return $this->dayName;
    }

    /**
     * Gets the result (after the task has been run).
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * Sets the result (after the task has been run).
     */
    protected function setResult(string $result)
    {
        $this->result = $result;
    }

    /**
     * Gets the result description.
     */
    public function getResultDescription(): string
    {
        return $this->resultDescription;
    }

    /**
     * Sets the result description.
     */
    protected function setResultDescription(string $resultDescription)
    {
        $this->resultDescription = $resultDescription;
    }

    /**
     * Gets the input data for the task.
     */
    protected function getInput(): string
    {
        return $this->input;
    }

    /**
     * Sets the input data for the task.
     */
    public function setInput(string $input = null)
    {
        $this->input = $input;
        return $this;
    }

    /**
     * Runs the task.
     */
    public function run()
    {
        // If we see this exception, there is clearly something lacking. :D
        throw new \Exception('No implementation for task!');

        return $this;
    }
}