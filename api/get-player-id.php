<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../classes/playerManager.php';
include_once '../classes/databaseManager.php';

$db = new DatabaseManager();
$connection = $db->getConnection();
$playerManager = new PlayerManager($connection);

$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
    $player = $playerManager->getPlayer($id);
    echo json_encode($player);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Hiányzó vagy hibás ID']);
}
exit;
