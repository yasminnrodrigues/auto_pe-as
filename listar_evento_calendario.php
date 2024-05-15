<?php

include_once './conexao.php';

$query_events = "SELECT id, title, color, star end FROM events";

$result_events = $conn->prepare($query_events);

$result_events->execute();

$eventos = [];

while($row_events = $result_events->fetch(PDO::fetch_assoc)){
    extract($row_events);

    $eventos[] = [
        'id => $id',
        'title => $title',
        'color => $color',
        'star => $star',
        'end => $end',
    ]
}

echo json_encode($eventos);