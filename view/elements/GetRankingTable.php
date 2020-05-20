<?php
require('../../model/database.php');

$category = $_POST["category"] ?? '';
// 0 tutte le partite
// 1 il migliore
$option = $_POST["option"] ?? '';

// verifico se la categoria richiesta esiste
$query = "SELECT nome FROM category WHERE nome = :category";
$check = $pdo->prepare($query);
$check->bindParam(':category', $category, PDO::PARAM_STR);
$check->execute();
$categories = $check->fetchAll(PDO::FETCH_ASSOC);


if (count($categories) > 0) $result = getPlayersRank($pdo,$category,$option);
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

function getPlayersRank($pdo, $category, $option){
    if($category!=null){
        // categoria ESISTE nel database
        // carico Rankin Globale per categoria
        if($option == 1){
            // migliore partita (miglior punteggio)
            $query = "
                SELECT u.username, max(g.score) as tot_score, g.esatte as tot_esatte,
                    g.errate as tot_errate
                FROM games g JOIN users u on g.user = u.id
                    JOIN category c on g.categoria = c.id
                WHERE c.nome = :categoria
                GROUP BY g.user
                ORDER BY tot_score DESC
                ";
            }else{
            //tutte le partite (somma punteggi)
            $query = "
                SELECT u.username, sum(g.score) as tot_score, sum(g.esatte) as tot_esatte,
                    sum(g.errate) as tot_errate, sum(g.vittoria) as tot_vittorie
                FROM games g JOIN users u on g.user = u.id
                    JOIN category c on g.categoria = c.id
                WHERE c.nome = :categoria
                GROUP BY g.user
                ORDER BY tot_score DESC
                ";
        }

        $check = $pdo->prepare($query);
        $check->bindParam(':categoria', $category, PDO::PARAM_STR);
        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_ASSOC);

    }
    else{
        // categoria NON ESISTE nel database
        // carico Rankin Globale (per tutte le categorie)
        if($option == 1){
            $query = "
                SELECT u.username, max(g.score) as tot_score, g.esatte as tot_esatte,
                    g.errate as tot_errate
                FROM games g JOIN users u on g.user = u.id
                    JOIN category c on g.categoria = c.id
                GROUP BY g.user
                ORDER BY tot_score DESC
            ";
        }else{
            $query = "
                SELECT u.username, sum(g.score) as tot_score, sum(g.esatte) as tot_esatte,
                    sum(g.errate) as tot_errate, sum(g.vittoria) as tot_vittorie
                FROM games g JOIN users u on g.user = u.id
                    JOIN category c on g.categoria = c.id
                GROUP BY g.user
                ORDER BY tot_score DESC
            ";
        }


        $check = $pdo->prepare($query);
        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_ASSOC);

    }
    return $result;
}


?>
