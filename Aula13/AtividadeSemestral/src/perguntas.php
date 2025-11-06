<?php
require_once 'conexao.php'; // importa a função de conexão

function selectPerguntas() {
    $connection = connectionDatabase();

    $result = pg_query($connection, "SELECT * FROM TBPERGUNTA");

    if (!$result) {
        die("Erro na consulta ao banco.");
    }

    $perguntas = [];

    while ($row = pg_fetch_assoc($result)) {
        $perguntas[] = $row;
    }

    pg_close($connection);
    return $perguntas;
}

// Retorna em JSON para o JS
header('Content-Type: application/json');
echo json_encode(selectPerguntas());
?>
