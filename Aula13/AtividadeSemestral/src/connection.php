<?php
function connectionDatabase() {
    $connectionString = "host=localhost port=5432 dbname=postgres user=miguel password=";
    $connection = pg_connect($connectionString);

    if (!$connection) {
        die("Erro ao conectar ao banco de dados.");
    }

    return $connection;
}
?>
