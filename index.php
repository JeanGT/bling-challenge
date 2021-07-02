<?php
include 'Exercise.php';
include 'Utils.php';
include 'Input.php';

include 'ex01/Exercise1.php';
include 'ex02/Exercise2.php';
include 'ex03/Exercise3.php';
include 'ex04/Exercise4.php';
include 'ex05/Exercise5.php';
include 'ex06/Exercise6.php';
include 'ex07/Exercise7.php';

$exercises = [
    new Exercise1(),
    new Exercise2(),
    new Exercise3(),
    new Exercise4(),
    new Exercise5(),
    new Exercise6(),
    new Exercise7()
];

echo "Teste técnico - Bling \n";
do {
    echo "\n1 - Rotacionar array\n2 - Ordenar array\n3 - Calcular diferença de datas\n4 - Calcular triângulos possíveis\n5 - Buscar texto\n6 - Calcular area da interseção de retângulos\n7 - Listar caminhos possíveis\n\n";

    $target_exercise = Input::readInt("Digite o número do exercício desejado: ", 1, 7) - 1;

    echo "\n";
    $exercises[$target_exercise]->execute();
    echo "\n";
} while (Input::readBool("Deseja executar outro exercício? (s/n): "));
