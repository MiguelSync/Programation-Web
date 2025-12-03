<?php

require_once 'pessoa1.php';

$pessoa = new Pessoa();
$pessoa->nome = 'Miguel Antonio';
$pessoa->sobrenome = 'Selhorst';

echo $pessoa->getNomeCompleto();