<?php
abstract class Exercise
{
    protected abstract function readInput();
    protected abstract function solve($input);
    protected function displayAnswer($answer)
    {
        echo "Resultado: \n";
        print_r($answer);
    }

    public function execute()
    {
        $input = $this->readInput();
        $answer = $this->solve($input);
        $this->displayAnswer($answer);
    }
}
