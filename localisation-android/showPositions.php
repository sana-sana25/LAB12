<?php

include_once __DIR__ . '/service/PositionService.php';

// Vérifier que la requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    showPositions();
}

function showPositions() {

    $service = new PositionService();

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode([
        "positions" => $service->getAll()
    ]);
}