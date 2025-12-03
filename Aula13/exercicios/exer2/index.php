<?php

require_once '../pessoa.php';
require_once '../endereco.php';
require_once '../contato.php';

use Aula13\Exercicios\Pessoa;
use Aula13\Exercicios\Endereco;
use Aula13\Exercicios\Contato;

$familia = [];

// Eu
$pessoa = new Pessoa();
$pessoa->setNome('Miguel Antonio');
$pessoa->setSobrenome('Selhorst');
$pessoa->setDataNascimento('21-04-2005');

$endereco = new Endereco();
$endereco->setLogradouro('Rua Vereador Pedro Hammes');
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

$familia[] = $pessoa;

//Irmão
$pessoa = new Pessoa();
$pessoa->setNome('Robson');
$pessoa->setSobrenome('Selhorst');
$pessoa->setDataNascimento('09-04-1983');

$endereco = new Endereco();
$endereco->setLogradouro('Rua Vereador Pedro Hammes');
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

$familia[] = $pessoa;

//Irmã
$pessoa = new Pessoa();
$pessoa->setNome('Micherli');
$pessoa->setSobrenome('Selhorst');
$pessoa->setDataNascimento('29-09-1992');

$endereco = new Endereco();
$endereco->setLogradouro('Rua Vereador Pedro Hammes');
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

$familia[] = $pessoa;

//Mãe
$pessoa = new Pessoa();
$pessoa->setNome('Rosinha Hellmann');
$pessoa->setSobrenome('Selhorst');
$pessoa->setDataNascimento('30-06-1969');

$endereco = new Endereco();
$endereco->setLogradouro('Rua Vereador Pedro Hammes');
$endereco->setBairro('Centro');
$endereco->setCidade('Aurora');
$endereco->setEstado('Santa Catarina');
$endereco->setCep('89186-000');

$telefone = new Contato();
$telefone->setTipo(2);
$telefone->setNome('Telefone');
$telefone->setValor('(47) 98814-7002');

$pessoa->setTelefone($telefone);
$pessoa->setEndereco($endereco);

$familia[] = $pessoa;

//Pai
$pessoa = new Pessoa();
$pessoa->setNome('Marino');
$pessoa->setSobrenome('Selhorst');
$pessoa->setDataNascimento('30-06-1965');

$endereco = new Endereco();
$endereco->setLogradouro('Rua Vereador Pedro Hammes');
$endereco->setBairro('Centro');
$endereco->setCidade('Aurora');
$endereco->setEstado('Santa Catarina');
$endereco->setCep('89186-000');

$telefone = new Contato();
$telefone->setTipo(2);
$telefone->setNome('Telefone');
$telefone->setValor('(47) 98853-9728');

$pessoa->setTelefone($telefone);
$pessoa->setEndereco($endereco);

$familia[] = $pessoa;

$dadosPessoa = '';

if (file_exists('familia.txt')) {
    foreach ($familia as $pessoaFamilia) {
        if ($dadosPessoa != '') {
            $dadosPessoa .= '\\n';
        }

        $dadosPessoa .= serialize($pessoaFamilia);
    }

    if (file_put_contents('familia.txt', $dadosPessoa)) {
        echo "Dados Salvos com sucesso!";
    } else{
        echo "Erro ao salvar os dados no arquivo";
    }
}