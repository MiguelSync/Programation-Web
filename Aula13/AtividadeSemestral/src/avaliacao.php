<?php

use Pdo\Pgsql;

require_once "connection.php";
require_once "query.php";

Query::begin();

date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date('d-m-Y H:i:s');
$respostas = json_decode(file_get_contents('php://input', true), true);
$feedback = array_pop($respostas);
$idAvaliacao = Query::insertQueryPreparedReturningColumn('TBAVALIACAO', ['avafeedback', 'avadatahora', 'setcodigo', 'discodigo'], [$feedback, $dataAtual, 1, 1], 'AVACODIGO');

foreach ($respostas as $numeroPergunta => $resposta) {
    Query::insertQueryPrepared('TBRESPOSTA', ['PERCODIGO', 'AVACODIGO', 'RESRESPOSTA'], [$numeroPergunta, $idAvaliacao, $resposta]);
}

Query::commit();
