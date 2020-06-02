<?php
$config = [
    'engine' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'tens_schema',
    'username' => 'root',
    'password' => '',
];

$db_config = $config['engine'] . ":host=".$config['host'] . ";dbname=" . $config['database'];

try {
    // creo oggetto PDO includo in tutti i file per cui e` necessario l'accesso al database
    $pdo = new PDO($db_config, $config['username'], $config['password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);

    // configuarzione
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (PDOException $exception) {
    exit("Connessione al database non riuscita " . $exception->getMessage());
}

?>