<?php
class Exercise4 extends Exercise
{
    protected function readInput()
    {
        $measures_count = 6;
        $measures = [];
        for ($i = 1; $i <= $measures_count; $i++) {
            $measures[$i - 1] = Input::readInt("Digite a medida $i: ", 1);
        }

        return [$measures, $measures_count];
    }

    protected function solve($input)
    {
        list($measures, $measures_count) = $input;

        $valid_triangles = [];
        for ($i = 0; $i < $measures_count - 2; $i++) {
            for ($j = $i + 1; $j < $measures_count - 1; $j++) {
                for ($k = $j + 1; $k < $measures_count; $k++) {
                    //Checks if a triangle is valid
                    if (
                        $measures[$i] < $measures[$j] + $measures[$k] &&
                        $measures[$j] < $measures[$i] + $measures[$k] &&
                        $measures[$k] < $measures[$j] + $measures[$i]
                    ) {
                        $valid_triangles = Utils::array_push($valid_triangles, [$measures[$i], $measures[$j], $measures[$k]]);
                    }
                }
            }
        }

        return $valid_triangles;
    }
}
