<?php
/* mostra l'input di selezione per la categoria */
require('../../model/database.php');

$query = "SELECT * FROM category";
$check = $pdo->prepare($query);
$check->execute();

$categories = $check->fetchAll(PDO::FETCH_ASSOC);

echo printOptionCategory($categories);


// stampa il menu a tendina con tutte le categorie presenti nel database
function printOptionCategory($categories){
    $html = '<select id="category" class="custom-select custom-select-lg my-rounded-pill-left my-rounded-pill-right">';
    $html.= '<option selected>Tutte le categorie</option>';

    foreach ($categories as $category){
        $html.= '<option>'.$category["nome"].'</option>';
    }

    $html.= '</select>';
    return $html;

}
?>