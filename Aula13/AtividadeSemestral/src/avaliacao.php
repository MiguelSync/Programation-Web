<?php

require_once "connection.php";
require_once "query.php";

class Avaliacao {

    public static function salvarAvaliacao(Request $request) {
        Query::begin();
        $dataAtual = date('d-m-Y');
        $respostas = $_POST;
        $feedback = array_pop($respostas);
        $idAvaliacao = Query::insertQueryPreparedReturningColumn('TBAVALIACAO', ['avafeedback', 'avadatahora', 'setcodigo', 'discodigo'], [$feedback, $dataAtual, 1, 1], 'AVACODIGO');
        
        foreach ($respostas as $numeroPergunta => $resposta) {
            Query::insertQueryPrepared('TBRESPOSTA', ['RESCODIGO', 'AVACODIGO', 'RESRESPOSTA'], [$idAvaliacao, $numeroPergunta, $resposta]);
        }
        Query::commit();
    }
}

