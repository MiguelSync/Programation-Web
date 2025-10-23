<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exer8</title>
</head>
<body>
    <form method="POST">
        <h3>Calcular parcelas com juros simples:</h3>
        <label>Valor à vista (R$):</label>
        <input type="number" name="valor" step="any" value="8654" required><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = $_POST["valor"];

        $parcelas = [24, 36, 48, 60];
        $taxa_inicial = 1.5; 

        echo "<h3>Valor à vista: R$ " . number_format($valor, 2, ',', '.') . "</h3>";
        echo "<h2>Opções de pagamento com Juros Simples:</h2>";

        foreach ($parcelas as $i => $p) {
            $taxa = $taxa_inicial + (0.5 * $i);
            $montante = $valor * (1 + ($taxa / 100) * ($p / 12));
            $valor_parcela = $montante / $p;

            echo "<p>$p vezes de <strong>R$ " . number_format($valor_parcela, 2, ',', '.') . "</strong> 
            (Taxa: $taxa% ao ano)</p>";
        }
    }
    ?>
</body>
</html>
