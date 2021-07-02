<?php
class Exercise1 extends Exercise
{
    protected function readInput()
    {
        list($array_size, $array) = Input::readArray();

        $k = Input::readInt('Digite quantas posições o array deve ser rotacionado: ', 0);

        return [$array_size, $array, $k];
    }

    protected function solve($input)
    {
        list($array_size, $array, $k) = $input;

        $k %= $array_size; //Map $k to a correspondent value [0, $array_size[

        $array = $this->reverseArray($array, 0, $k - 1);
        $array = $this->reverseArray($array, $k, $array_size - 1);
        $array = $this->reverseArray($array, 0, $array_size - 1);

        return $array;
    }

    private function reverseArray($array, $start, $end)
    {
        while ($start < $end) {
            //Swap $array[$start] and $array[$end]
            $aux = $array[$start];
            $array[$start] = $array[$end];
            $array[$end] = $aux;

            $start++;
            $end--;
        }

        return $array;
    }
}
