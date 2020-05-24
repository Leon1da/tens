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

if(count($result)>0) echo printRankingTable($result,$option);
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
//   SELECT u.username, c.nome, g.score, g.esatte FROM games g JOIN users u ON g.user = u.id JOIN category c ON c.id = g.categoria GROUP BY u.username, g.categoria ORDER BY g.score DESC
    $query = "";
    if($option == 1){
        // migliore partita di sempre (max(score))
        $query .= "SELECT u.username,
                          g.score as tot_score, 
                          g.esatte as tot_esatte, 
                          g.errate as tot_errate ";

    }else{
        // somma tutte le partite (sum(score) per giocatore))
        $query .= "SELECT u.username,
                          sum(g.score) as tot_score, 
                          sum(g.esatte) as tot_esatte,
                          sum(g.errate) as tot_errate, 
                          sum(g.vittoria) as tot_vittorie ";
    }

    $query .= "FROM games g JOIN users u on g.user = u.id ";

    if($category_id!=null){
        // filtro per categoria
        $query .= "JOIN category c on g.categoria = c.id ";
        $query .= "WHERE g.categoria = :categoria_id ";
    }

    if($option == 0){
        $query .= "GROUP BY u.username ";
    }

    $query .= "ORDER BY tot_score DESC ";

//    echo $query;

    $check = $pdo->prepare($query);
    if($category_id!=null){
        $check->bindParam(':categoria_id', $category_id, PDO::PARAM_STR);
    }
    $check->execute();
    return $check->fetchAll(PDO::FETCH_ASSOC);
}

//SELECT u.username, max(g.score) as tot_score, g.esatte as tot_esatte, g.errate as tot_errate
//FROM games g JOIN users u on g.user = u.id JOIN category c on g.categoria = c.id
//WHERE c.nome = :categoria
//GROUB BY u.username
//ORDER BY tot_score DESC


?>
