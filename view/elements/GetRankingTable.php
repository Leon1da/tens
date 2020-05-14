<?php
require('../../model/database.php');

$category = $_POST["category"] ?? '';

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
        WHERE c.nome = :categoria
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
if(count($result)>0){
    echo printRankingTable($result);
}else{
    echo "<h6>Nessuno si e` ancora classificato in <b>".$category."</b> <br> Che cosa aspetti? Diventa il primo!</h6>";
}
// stampa la risposta del db in formato tabellare
function printRankingTable($vector){
    $table='
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Score</th>
            <th scope="col">Esatte</th>
            <th scope="col">Errate</th>
            <th scope="col">Mancate</th>
        </tr>
        </thead>
        
        <tbody id="table_body_content">';
    // stampo riga per riga la classifica
    $i = 1;
    foreach ($vector as $row) {
        $table .= '<tr>';
        $table .= '<th scope="row">' . $i . '</th>';
        $table .= '<td>' . $row['username'] . '</td>';
        $table .= '<td>' . $row['tot_score'] . '</td>';
        $table .= '<td>' . $row['tot_esatte'] . '</td>';
        $table .= '<td>' . $row['tot_errate'] . '</td>';
        $table .= '<td>' . $row['tot_mancate'] . '</td>';
        $table .= '</tr>';
        $i++;
    }
    $table.='</tbody> </table>';
    return $table;
}

//}
?>
