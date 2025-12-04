<?php

require_once "query.php";

$dispositivo = $_GET['dispositivo']; // DISCODIGO

// Buscar setor do dispositivo
$sqlSetor = "
    SELECT SETCODIGO 
    FROM TBDISPOSITIVO 
    WHERE DISCODIGO = {$dispositivo}
";
$resultSetor = Query::query($sqlSetor);

$setor = null;
if ($resultSetor) {
    $row = pg_fetch_assoc($resultSetor);
    $setor = $row['setcodigo'];
}

// Buscar perguntas ativas do setor
$perguntas = [];

if ($setor) {
    $sqlPerguntas = "
        SELECT PERCODIGO, PERTEXTO
        FROM TBPERGUNTA
        WHERE SETCODIGO = {$setor}
          AND PERSTATUS = 'ATIVO'
    ";

    $resultPerguntas = Query::query($sqlPerguntas);

    if ($resultPerguntas) {
        while ($pergunta = pg_fetch_assoc($resultPerguntas)) {
            $perguntas[$pergunta['percodigo']] = $pergunta['pertexto'];
        }
    }
}

echo json_encode($perguntas);
