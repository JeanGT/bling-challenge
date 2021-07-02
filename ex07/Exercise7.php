<?php
include 'ex07/Connection.php';

class Exercise7 extends Exercise
{
    private $connections;
    private $end_node;
    private $all_paths;

    protected function readInput()
    {
        $this->all_paths = [];

        if (Input::readBool('Deseja usar o mapa padrão? (s/n): ')) {
            $this->connections = [
                new Connection('A', 'B', 7),
                new Connection('A', 'D', 5),
                new Connection('B', 'D', 9),
                new Connection('B', 'C', 8),
                new Connection('B', 'E', 7),
                new Connection('C', 'E', 5),
                new Connection('D', 'E', 15),
                new Connection('D', 'F', 6),
                new Connection('E', 'F', 8),
                new Connection('E', 'G', 9),
                new Connection('F', 'G', 11)
            ];

            $this->end_node = 'E';
            $start_node = 'A';
        } else {
            $this->connections = [];
            $connections_amount = Input::readInt('Digite o número de conexões entre nódulos: ');
            echo "Digite as conexões: \n";
            for ($i = 1; $i <= $connections_amount; $i++) {
                echo "Conexão $i:\n";
                $this->connections = Utils::array_push($this->connections, new Connection(
                    readline("\tPrimeiro nódulo: "),
                    readline("\tSegundo nódulo: ")
                ));
            }

            $start_node = readline('Nódulo inicial: ');
            $this->end_node = readline('Nódulo final: ');
        }

        return $start_node;
    }

    protected function solve($start_node)
    {
        $this->calcAllPaths($start_node, [], []);

        return $this->all_paths;
    }

    private function calcAllPaths($current_node, $current_path, $visited_nodes)
    {
        $current_path = Utils::array_push($current_path, $current_node);
        $visited_nodes[$current_node] = true;

        if ($current_node == $this->end_node) {
            $this->all_paths = Utils::array_push($this->all_paths, $current_path);
            return;
        }

        for ($i = 0; $i < Utils::count($this->connections); $i++) {
            $next_node = null;
            if ($this->connections[$i]->node_a == $current_node) {
                $next_node = $this->connections[$i]->node_b;
            } else if ($this->connections[$i]->node_b == $current_node) {
                $next_node = $this->connections[$i]->node_a;
            }

            if ($next_node !== null && !isset($visited_nodes[$next_node])) {
                $this->calcAllPaths($next_node, $current_path, $visited_nodes);
            }
        }
    }
}
