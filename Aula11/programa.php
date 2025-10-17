<?php

$connectionString = "host=localhost 
                     port=5432 
                     dbname=postgres 
                     user=miguel 
                     password=";
$connection = pg_connect($connectionString);
if($connection) {
    echo "Database conectado com sucesso! <br>";

    // $result = pg_query($connection,
    //                    "SELECT COUNT(*) AS QTDTABS FROM PG_TABLES");

    $result = pg_query($connection,
                       "SELECT COUNT(*) AS QTDTABS FROM TBPESSOA");
    if($result) {
        $row = pg_fetch_assoc($result);
        echo "Quantidade de tabelas no database: ".$row['qtdtabs'];
    } else {
        echo 'Erro ao executar a consulta.';
    }

    //INSERIR DADOS NA TABELA TBPESSOA
    $aDadosPessoa = array('João', 'Silva', 'joao.silva@gmail.com', '123456', 'São Paulo', 'SP');
    $resultInsert = pg_query_params($connection,
                                   'INSERT INTO TBPESSOA (pesnome,
                                                          pessobrenome,
                                                          pesemail,
                                                          pespassword,
                                                          pescidade,
                                                          pesestado)
                                    VALUES ($1, $2, $3, $4, $5, $6)',
                                    $aDadosPessoa);
    if ($resultInsert) {
        echo '<br>Dados inseridos com sucesso!';
    } else {
        echo '<br>Dados não inseridos!';
    }           
} else {
    echo "database não está conectado";
}


