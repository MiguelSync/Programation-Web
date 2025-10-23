



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exer6</title>
</head>
<body>
    <form method="POST">
        <h3>Informe o preço e quantidade (kg):</h3>
        Maçã: Preço <input type="number" name="maca_preco" step="any" required> Quantidade <input type="number" name="maca_qtd" step="any" required><br>
        Melancia: Preço <input type="number" name="melancia_preco" step="any" required> Quantidade <input type="number" name="melancia_qtd" step="any" required><br>
        Laranja: Preço <input type="number" name="laranja_preco" step="any" required> Quantidade <input type="number" name="laranja_qtd" step="any" required><br>
        Repolho: Preço <input type="number" name="repolho_preco" step="any" required> Quantidade <input type="number" name="repolho_qtd" step="any" required><br>
        Cenoura: Preço <input type="number" name="cenoura_preco" step="any" required> Quantidade <input type="number" name="cenoura_qtd" step="any" required><br>
        Batatinha: Preço <input type="number" name="batatinha_preco" step="any" required> Quantidade <input type="number" name="batatinha_qtd" step="any" required><br><br>
        <button type="submit">Calcular Total</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dinheiro = 50;

        $maca = $_POST["maca_preco"] * $_POST["maca_qtd"];
        $melancia = $_POST["melancia_preco"] * $_POST["melancia_qtd"];
        $laranja = $_POST["laranja_preco"] * $_POST["laranja_qtd"];
        $repolho = $_POST["repolho_preco"] * $_POST["repolho_qtd"];
        $cenoura = $_POST["cenoura_preco"] * $_POST["cenoura_qtd"];
        $batatinha = $_POST["batatinha_preco"] * $_POST["batatinha_qtd"];

        $total = $maca + $melancia + $laranja + $repolho + $cenoura + $batatinha;

        echo "<h3>Valor total da compra: R$ " . number_format($total, 2, ',', '.') . "</h3>";

        if ($total > $dinheiro) {
            $faltou = $total - $dinheiro;
            echo "<p style='color:red;'>Joãozinho ficou devendo R$ " . number_format($faltou, 2, ',', '.') . ".</p>";
        } elseif ($total < $dinheiro) {
            $sobrou = $dinheiro - $total;
            echo "<p style='color:blue;'>Joãozinho ainda pode gastar R$ " . number_format($sobrou, 2, ',', '.') . ".</p>";
        } else {
            echo "<p style='color:green;'>O saldo para compras foi esgotado exatamente!</p>";
        }
    }
    ?>
</body>
</html>