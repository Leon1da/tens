<?php
require_once('./database.php');

$query = "SELECT nome FROM category";
$check = $pdo->prepare($query);
$check->execute();

echo json_encode($check->fetchAll(PDO::FETCH_COLUMN));
