<?php
$pastas = array(
    "bsn" => array(
        "3a Fase" => array("desenvWeb", "bancoDados 1", "engSoft 1"),
        "4a Fase" => array("Intro Web", "bancoDados 2", "engSoft 2")
    )
);

function imprimirArvore($array, $nivel = 0) {
    foreach ($array as $chave => $valor) {
        // Gera os traços de acordo com o nível
        echo str_repeat("-", $nivel + 1) . " ";

        // Se for um array associativo, imprime a chave
        if (is_array($valor)) {
            echo $chave . "<br>";
            // Chamada recursiva para os filhos
            imprimirArvore($valor, $nivel + 1);
        } else {
            // Se não for array, imprime direto o valor
            echo $valor . "<br>";
        }
    }
}

// Chamada
imprimirArvore($pastas);
?>
