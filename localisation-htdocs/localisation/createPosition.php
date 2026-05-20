<?php

header('Content-Type: application/json; charset=utf-8');

// Vérifier que la requête est bien en POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {

    http_response_code(405);

    echo json_encode([
        "ok" => false,
        "error" => "POST required"
    ]);

    exit;
}

include_once __DIR__ . '/service/PositionService.php';
include_once __DIR__ . '/classe/Position.php';

// Récupération des données envoyées par Android
$latitude = $_POST['latitude'] ?? null;
$longitude = $_POST['longitude'] ?? null;
$date = $_POST['date'] ?? null;
$imei = $_POST['imei'] ?? null;

// IP du client
$ip = $_SERVER['REMOTE_ADDR'];

// Vérification des paramètres
if ($latitude === null ||
    $longitude === null ||
    $date === null ||
    $imei === null) {

    http_response_code(400);

    echo json_encode([
        "ok" => false,
        "error" => "Missing params",
        "ip" => $ip
    ]);

    exit;
}

try {

    $service = new PositionService();

    $position = new Position(
        null,
        $latitude,
        $longitude,
        $date,
        $imei
    );

    $service->create($position);

    echo json_encode([
        "ok" => true,
        "message" => "Position inserted",
        "ip" => $ip
    ]);

} catch (Exception $e) {

    http_response_code(500);

    echo json_encode([
        "ok" => false,
        "error" => $e->getMessage(),
        "ip" => $ip
    ]);
}