<?php

require_once "query.php";

$iSetor = 1;
$sSql = 'SELECT * FROM TBPERGUNTA WHERE SETCODIGO = '. $iSetor;
$perguntas = [];
$result = Query::query($sSql);

if ($result) {
    while ($pergunta = pg_fetch_assoc($result)) {
        // echo var_dump($pergunta);
        $perguntas[$pergunta['percodigo']] = $pergunta['pertexto'];
    }
}
echo json_encode($perguntas);