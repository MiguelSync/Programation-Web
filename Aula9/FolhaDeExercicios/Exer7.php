<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exer7</title>
</head>
<body>
    <form method="POST">
        <h3>Calcular juros do financiamento:</h3>
        <label>Valor à vista (R$):</label>
        <input type="number" name="valor_avista" step="any" value="22500" required><br><br>

        <label>Valor da parcela (R$):</label>
        <input type="number" name="parcela" step="any" value="489.65" required><br><br>

        <label>Quantidade de parcelas:</label>
        <input type="number" name="quantidade" value="60" required><br><br>

        <button type="submit">Calcular Juros</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor_avista = $_POST["valor_avista"];
        $parcela = $_POST["parcela"];
        $quantidade = $_POST["quantidade"];

        $total_pago = $parcela * $quantidade;
        $juros = $total_pago - $valor_avista;

        echo "<h3>Valor total pago no financiamento: R$ " . number_format($total_pago, 2, ',', '.') . "</h3>";
        echo "<h3>Valor à vista do carro: R$ " . number_format($valor_avista, 2, ',', '.') . "</h3>";
        echo "<h2>Mariazinha pagará R$ " . number_format($juros, 2, ',', '.') . " apenas de juros.</h2>";
    }
    ?>
</body>
</html>
