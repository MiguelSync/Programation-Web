<?php

$notas = [8.5, 7.0, 9.0, 6.5, 10.0];


$faltas = [0, 1, 0, 0, 1, 0, 0, 0, 1, 0]; 


function calcularMedia($notas) {
    $soma = array_sum($notas);
    $quantidade = count($notas);
    return $quantidade > 0 ? $soma / $quantidade : 0;
}


function verificarAprovacaoNota($media) {
    return $media >= 7 ? "Aprovado por Nota" : "Reprovado por Nota";
}


function calcularFrequencia($faltas) {
    $totalAulas = count($faltas);
    $totalFaltas = array_sum($faltas);
    $frequencia = ($totalAulas - $totalFaltas) / $totalAulas * 100;
    return $frequencia;
}


function verificarAprovacaoFrequencia($frequencia) {
    return $frequencia >= 70 ? "Aprovado por Frequência" : "Reprovado por Frequência";
}


$media = calcularMedia($notas);
$aprovacaoNota = verificarAprovacaoNota($media);

$frequencia = calcularFrequencia($faltas);
$aprovacaoFrequencia = verificarAprovacaoFrequencia($frequencia);


echo "Média: " . number_format($media, 2, ',', '.') . "<br>";
echo "Status Nota: $aprovacaoNota<br>";
echo "Frequência: " . number_format($frequencia, 2, ',', '.') . "%<br>";
echo "Status Frequência: $aprovacaoFrequencia<br>";

