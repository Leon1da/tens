<?php
require_once('../../model/database.php');

if(isset($_POST["category"])) {
    $category = $_POST["category"];

    // verifico se la categoria richiesta esiste
    $query = "SELECT nome FROM category WHERE nome = :category";
    $check = $pdo->prepare($query);
    $check->bindParam(':category', $category, PDO::PARAM_STR);
    $check->execute();
    $categories = $check->fetchAll(PDO::FETCH_ASSOC);

    $result = '';
    if (count($categories) > 0) {

        // categoria ESISTE nel db
        // carico Ranking per la categoria selezionata
        $query = "
            SELECT u.username, sum(g.score) as tot_score, sum(g.esatte) as tot_esatte, 
                sum(g.errate) as tot_errate, sum(g.mancate) as tot_mancate
            FROM games g JOIN users u on g.user = u.id 
                JOIN category c on g.categoria = c.id   
            WHERE nome = :categoria
            GROUP BY g.user
            ORDER BY tot_score DESC   
        ";

        $check = $pdo->prepare($query);
        $check->bindParam(':categoria', $category, PDO::PARAM_STR);
        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_ASSOC);

    } else {
        // categoria NON ESISTE nel database
        // carico Rankin Globale (per tutte le categorie)
        $query = "
            SELECT u.username, sum(g.score) as tot_score, sum(g.esatte) as tot_esatte, 
                sum(g.errate) as tot_errate, sum(g.mancate) as tot_mancate
            FROM games g JOIN users u on g.user = u.id 
                JOIN category c on g.categoria = c.id   
            GROUP BY g.user
            ORDER BY tot_score DESC   
        ";

        $check = $pdo->prepare($query);
        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_ASSOC);

    }

    // stampa ogni riga del risultato in forma tabellare
    $i = 1;
    $table_body_content = '';
    foreach ($result as $row) {
        $table_body_content .= '<tr>';
        $table_body_content .= '<th scope="row">' . $i . '</th>';
        $table_body_content .= '<td>' . $row['username'] . '</td>';
        $table_body_content .= '<td>' . $row['tot_score'] . '</td>';
        $table_body_content .= '<td>' . $row['tot_esatte'] . '</td>';
        $table_body_content .= '<td>' . $row['tot_errate'] . '</td>';
        $table_body_content .= '<td>' . $row['tot_mancate'] . '</td>';
        $table_body_content .= '</tr>';
        $i++;
    }

    echo $table_body_content;
}
?>

