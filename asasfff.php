<?php

function dijkstra(array $graph, int $start): array {
    $numNodes = count($graph);
    

    $distances = array_fill(0, $numNodes, INF);
    $distances[$start] = 0;


    $priorityQueue = new SplPriorityQueue();
    $priorityQueue->insert($start, 0);

    while (!$priorityQueue->isEmpty()) {
        $currentNode = $priorityQueue->extract();
        
        foreach ($graph[$currentNode] as $neighbor => $weight) {
            $newDistance = $distances[$currentNode] + $weight;

            if ($newDistance < $distances[$neighbor]) {
                $distances[$neighbor] = $newDistance;
                $priorityQueue->insert($neighbor, -$newDistance);
            }
        }
    }

    return $distances;
}

$graph = [
    [5, 1, 3, 2, 1],
    [0, 5, 1, 3, 4],
    [2, 4, 0, 2, 1],
    [1, 3, 2, 0, 4],
    [3, 2, 4, 1, 5]
];

$startNode = 3;
$result = dijkstra($graph, $startNode);


var_dump($result);
