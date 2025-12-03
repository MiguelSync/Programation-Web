<?php

require_once '../pessoa.php';
require_once '../endereco.php';
require_once '../contato.php';

use Aula13\Exercicios\Pessoa;
use Aula13\Exercicios\Endereco;
use Aula13\Exercicios\Contato;

$pessoa = new Pessoa();
$pessoa->setNome('Miguel Antonio');
$pessoa->setSobrenome('Selhorst');
$pessoa->setDataNascimento('21-04-2005');

$endereco = new Endereco();
$endereco->setLogradouro('Rua vereador pedro Hammes');
$endereco->setBairro('Centro');
$endereco->setCidade('Aurora');
$endereco->setEstado('Santa Catarina');
$endereco->setCep('89186-000');

$telefone = new Contato();
$telefone->setTipo(2);
$telefone->setNome('Telefone');
$telefone->setValor('(47) 99744-4072');

$pessoa->setTelefone($telefone);
$pessoa->setEndereco($endereco);