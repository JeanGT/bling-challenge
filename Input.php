<?php
class Input
{
    static function readInt($msg, $min = PHP_INT_MIN, $max = PHP_INT_MAX)
    {
        while (true) {
            $input = readline($msg);

            if (!is_numeric($input)) {
                echo "Digite um número!\n";
            } else if ($input < $min) {
                echo "O valor não pode ser menor que $min!\n";
            } else if ($input > $max) {
                echo "O valor não pode ser maior que $max!\n";
            } else { //The input is valid
                return (int) $input;
            }
        }
    }

    static function readBool($msg)
    {
        while (true) {
            $input = readline($msg);

            if ($input == 's') {
                return true;
            } else if ($input == 'n') {
                return false;
            } else {
                echo "Digite 's' ou 'n'!\n";
            }
        }
    }

    static function readDate($msg)
    {
        while (true) {
            $input = readline($msg);

            if (Utils::count($input) == 10) {

                $day = Utils::substr($input, 0, 2);
                $month = Utils::substr($input, 3, 2);
                $year = Utils::substr($input, 6, 4);

                if (
                    is_numeric($day) &&
                    is_numeric($month) &&
                    is_numeric($year) &&
                    Utils::substr($input, 2, 1) == '/' &&
                    Utils::substr($input, 5, 1) == '/'
                ) { //The input is valid
                    return [$day, $month, $year];
                }
            }
            echo "Digite uma data válida! (dd/mm/aaaa)\n";
        }
    }

    static function readArray()
    {
        $array = [];

        $array_size = Input::readInt("Digite o tamanho do array: ", 1);
        echo "Digite o array:\n";
        for ($i = 0; $i < $array_size; $i++) {
            $array[$i] = Input::readInt("Elemento $i: ");
        }

        return [$array_size, $array];
    }
}
