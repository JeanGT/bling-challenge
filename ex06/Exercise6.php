<?php
class Exercise6 extends Exercise
{
    protected function readInput()
    {
        $vertices = [];
        $rectangles_count = 2;
        for ($i = 0; $i < $rectangles_count * 2; $i++) {
            echo "Digite as coordenadas do vértice ";
            echo $i % 2 == 0 ? "inferior esquerdo" : "superior direito";
            echo " do retângulo ";
            echo (int)($i / 2) + 1;
            echo ":\n";

            $vertices[$i] = [
                'x' => Input::readInt("\tx: "),
                'y' => Input::readInt("\ty: ")
            ];
        }

        return $vertices;
    }

    protected function solve($vertices)
    {
        $overlap_base = Utils::min($vertices[1]['x'], $vertices[3]['x']) - Utils::max($vertices[0]['x'], $vertices[2]['x']);
        $overlap_height = Utils::min($vertices[1]['y'], $vertices[3]['y']) - Utils::max($vertices[0]['y'], $vertices[2]['y']);

        if ($overlap_base <= 0 || $overlap_height <= 0) { //There is no overlap
            return 0;
        } else {
            return $overlap_base * $overlap_height;
        }
    }
}
