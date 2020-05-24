<?php
require('../../model/database.php');

$category = $_POST["category"] ?? '';

// 0 tutte le partite
// 1 il migliore
$option = $_POST["option"] ?? '';

// verifico se la categoria richiesta esiste
$query = "SELECT id,nome FROM category WHERE nome = :category";
$check = $pdo->prepare($query);
$check->bindParam(':category', $category, PDO::PARAM_STR);
$check->execute();
$categories = $check->fetchAll(PDO::FETCH_ASSOC);


if (count($categories) > 0) $result = getPlayersRank($pdo,$categories[0]['id'],$option);
else $result = getPlayersRank($pdo,null,$option);

if(count($result) > 0) echo printRankingTable($result,$option);
else echo "<h6>Nessuno si e` ancora classificato in <b>".$category."</b> <br> Che cosa aspetti? Diventa il primo!</h6>";

// stampa la risposta del db in formato tabellare
function printRankingTable($vector, $option){
    $table='
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Score</th>
            <th scope="col">Esatte</th>
            <th scope="col">Errate</th>';

    if($option == 0){
        $table.='<th scope="col">Vittorie</th>';
    }

    $table.='
        </tr>
        </thead>
        <tbody id="table_body_content">';

    // stampo riga per riga la classifica
    $pos = 1;
    foreach ($vector as $row) {
        $table .= '<tr>';
        switch ($pos){
            case 1:
                $table .= '<th scope="row"><img src="resources/1st.svg" alt="" width="32" height="32"></th>';
                break;
            case 2:
                $table .= '<th scope="row"><img src="resources/2nd.svg" alt="" width="32" height="32"></th>';
                break;
            case 3:
                $table .= '<th scope="row"><img src="resources/3nd.svg" alt="" width="32" height="32"></th>';
                break;
            default:
                $table .= '<th scope="row">&nbsp;&nbsp;'.$pos.'</th>';
                break;
        }
        $table .= '<td>' . $row['username'] . '</td>';
        $table .= '<td>' . $row['tot_score'] . '</td>';
        $table .= '<td>' . $row['tot_esatte'] . '</td>';
        $table .= '<td>' . $row['tot_errate'] . '</td>';
        if($option==0){
            $table .= '<td>' . $row['tot_vittorie'] . '</td>';
        }
        $table .= '</tr>';
        $pos++;
    }
    $table.='</tbody> </table>';
    return $table;
}

function getPlayersRank($pdo, $category_id, $option){

    $query = "";
    if($option == 1){
        // best game
        $query.= "
            SELECT users.username, games.score as tot_score, games.esatte as tot_esatte, games.errate as tot_errate
            FROM users,games,";

        if($category_id != null){
            $query.= "(SELECT user,MAX(score) as maxscore FROM games WHERE categoria = :categoria_id GROUP BY games.user) AS t";
        }else{
            $query.= "(SELECT user,MAX(score) as maxscore FROM games GROUP BY games.user) AS t";
        }

        $query.=" WHERE users.id = t.user AND games.score = t.maxscore ORDER BY tot_score DESC";


    }else{
        // all game
        $query.= "
            SELECT u.username, SUM(g.score) AS tot_score, SUM(g.esatte) AS tot_esatte, SUM(g.errate) as tot_errate, SUM(g.vittoria) AS tot_vittorie
            FROM users u, games g";
        if($category_id != null){
            $query.= ", category c WHERE c.id = g.categoria AND g.categoria = :categoria_id AND g.user = u.id";
        }else{
            $query.= " WHERE g.user = u.id";
        }
        $query.="
            GROUP BY u.username
            ORDER BY tot_score DESC";

    }

    echo $query;

    $check = $pdo->prepare($query);
    if($category_id!=null){
        $check->bindParam(':categoria_id', $category_id, PDO::PARAM_STR);
    }
    $check->execute();
    $result = $check->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}



// migliore partita
// SELECT users.username, games.score as tot_score, games.esatte as tot_esatte, games.errate as tot_errate
// FROM users,games,
//  (SELECT user,MAX(score) as maxscore FROM games GROUP BY games.user) AS t
// WHERE users.id = t.user AND games.score = t.maxscore ORDER BY tot_score DESC

// migliore partita per categoria
// SELECT users.username, games.score, games.esatte, games.errate
// FROM users,games,
//(SELECT user,MAX(score) as maxscore FROM games WHERE categoria = 3 GROUP BY games.user) AS t
// WHERE users.id = t.user AND games.score = t.maxscore ORDER BY games.score DESC

// tutte le partite
// SELECT u.username, SUM(g.score) AS tot_score, SUM(g.esatte), SUM(g.errate), SUM(g.vittoria)
// FROM users u JOIN games g ON g.user = u.id
// GROUP BY u.username
// ORDER BY tot_score DESC

?>


