<?php

include_once '../classes/databaseManager.php';
include_once '../classes/trainingManager.php';

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

$db = new DatabaseManager();
$connection = $db->getConnection();
$trainingManager = new TrainingManager($connection);

$input = json_decode(file_get_contents('php://input'), true);
$date = $input['date'] ?? null;
$players = $input['players'] ?? [];


if (!$date || empty($players)) {
    echo json_encode(['status' => 'error', 'message' => 'Hiányzó adat']);
    exit;
}

$trainingId = $trainingManager->createTraining($date, $players);


echo json_encode(['status' => 'ok', 'message' => 'Jelenlét elmentve']);
?>