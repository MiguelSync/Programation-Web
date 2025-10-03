<?php
// Função para calcular o valor final
function calcularValorFinal($valor, $desconto) {
    if (!is_numeric($valor) || !is_numeric($desconto)) {
        throw new Exception("Parâmetros inválidos. Informe apenas números.");
    }
    if ($valor < 0 || $desconto < 0) {
        throw new Exception("Valor e desconto não podem ser negativos.");
    }
    if ($desconto > $valor) {
        throw new Exception("Desconto não pode ser maior que o valor.");
    }

    return $valor - $desconto;
}

try {
    // Captura os parâmetros da QueryString
    $valor = isset($_REQUEST['valor']) ? $_REQUEST['valor'] : null;
    $desconto = isset($_REQUEST['desconto']) ? $_REQUEST['desconto'] : null;

    // Verifica se foram passados
    if ($valor === null || $desconto === null) {
        throw new Exception("Informe os parâmetros 'valor' e 'desconto' na URL. Ex: arquivo.php?valor=10&desconto=2");
    }

    // Calcula valor final
    $resultado = calcularValorFinal($valor, $desconto);

    // Retorna ao cliente
    echo "Valor informado: R$ " . number_format($valor, 2, ',', '.') . "<br>";
    echo "Desconto: R$ " . number_format($desconto, 2, ',', '.') . "<br>";
    echo "<strong>Valor final: R$ " . number_format($resultado, 2, ',', '.') . "</strong>";

} catch (Exception $e) {
    // Tratamento de erro
    echo "Erro: " . $e->getMessage();
}
?>
