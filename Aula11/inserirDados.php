<?php
if (sizeof($_POST) == 0) {
    return;
} 
$connectionString = "host=localhost 
                     port=5432 
                     dbname=postgres 
                     user=miguel 
                     password=";
$connection = pg_connect($connectionString);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
         $aDadosPessoa = array($_POST["pesnome"], $_POST["pessobrenome"], $_POST["pesemail"], $_POST["pespassword"], $_POST["pescidade"], $_POST["pesestado"]);
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
        header("Location: http://localhost:8000/Aula11/index.html");
    } else {
        echo '<br>Dados não inseridos!';
    }                         
}

