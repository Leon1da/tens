<?php
require_once('../model/database.php');

$query = "SELECT * FROM category";
$check = $pdo->prepare($query);
$check->execute();

$categories = $check->fetchAll(PDO::FETCH_ASSOC);
$category_options = "";
foreach ($categories as $category){
    $category_options.= '<option>'.$category["nome"].'</option>';
}

echo $category_options;
