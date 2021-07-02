<?php
class Connection
{
    public $node_a;
    public $node_b;
    public $distance; //Currently unused

    public function __construct($node_a, $node_b, $distance = 0)
    {
        $this->node_a = $node_a;
        $this->node_b = $node_b;
        $this->distance = $distance;
    }
}
