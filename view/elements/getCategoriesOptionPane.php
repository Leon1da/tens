<?php
require('../../model/database.php');

$query = "SELECT * FROM category";
$check = $pdo->prepare($query);
$check->execute();

$categories = $check->fetchAll(PDO::FETCH_ASSOC);

echo printOptionCategory($categories);


// stampa il menu a tendina con tutte le categorie presenti nel database
function printOptionCategory($categories){
    $html = '<select id="category" class="form-control">';
    $html.= '<option selected>All categories</option>';

    foreach ($categories as $category){
        $html.= '<option>'.$category["nome"].'</option>';
    }

    $html.= '</select>';
    return $html;

}
?>
