<?php
header('Content-Type: application/json');

include_once '../classes/textManager.php';
include_once '../classes/databaseManager.php';

$db = new DatabaseManager();
$connection = $db->getConnection();

$textManager = new TextManager($connection);
$texts = $textManager->getTexts();

echo json_encode($texts);
?>
