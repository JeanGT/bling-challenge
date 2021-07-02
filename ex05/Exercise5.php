<?php
class Exercise5 extends Exercise
{
    protected function readInput()
    {
        $txt = readline("Digite o texto: ");
        $target_txt = readline("Digite o termo a ser buscado: ");

        return [$txt, $target_txt];
    }

    protected function solve($input)
    {
        list($txt, $target_txt) = $input;

        $txt_size = Utils::count($txt);
        $target_txt_size = Utils::count($target_txt);

        $answers = [];

        for ($i = 0; $i <= $txt_size - $target_txt_size; $i++) {
            for ($j = 0; $j < $target_txt_size; $j++) {
                if ($txt[$i + $j] != $target_txt[$j])
                    break;
            }
            //At this point $j equals the number of characters that match starting from $i

            if ($j == $target_txt_size) {
                $answers = Utils::array_push($answers, $i);
            }
        }

        return Utils::count($answers) == 0 ? "Termo não encontrado..." : $answers;
    }
}
