<?php
header('Content-Type: application/json');

include_once '../classes/playerManager.php';
include_once '../classes/databaseManager.php';

$db = new DatabaseManager();
$connection = $db->getConnection();

$playerManager = new PlayerManager($connection);

$players = $playerManager->getPlayers();


echo json_encode($players);
?>