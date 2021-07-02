<?php
class Exercise2 extends Exercise
{
    protected function readInput()
    {
        return Input::readArray();
    }

    protected function solve($input)
    {
        list($array_size, $array) = $input;

        for ($i = 0; $i < $array_size - 1; $i++) {
            $is_even = $array[$i] % 2 == 0;
            $is_next_even = $array[$i + 1] % 2 == 0;

            //Checks if the current and the next need to be swapped
            if (
                ($is_even && $is_next_even && $array[$i] > $array[$i + 1]) ||   //Ex: 4 and 2
                (!$is_even && !$is_next_even && $array[$i] < $array[$i + 1]) || //Ex: 3 and 5
                (!$is_even && $is_next_even)                                    //Ex: 7 and 2
            ) {
                //Swap current and next
                $aux = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $aux;

                if ($i != 0) {
                    //go back to compare next with previous
                    $i -= 2;
                }
            }
        }

        return $array;
    }
}
