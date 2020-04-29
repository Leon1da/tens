<?php
require_once('database.php');

$query = "SELECT codice FROM playlists WHERE categoria_id = (SELECT id FROM category WHERE nome = :genre)";
$check = $pdo->prepare($query);
$check->bindParam(':genre',$_GET['genre']);
$check->execute();

echo json_encode($check->fetchAll(PDO::FETCH_COLUMN));