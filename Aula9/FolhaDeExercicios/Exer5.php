<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exer5</title>
</head>
<body>
    <form method="POST">
        Base: <input type="number" name="base" step="any" required><br>
        Altura: <input type="number" name="altura" step="any" required><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $base = $_POST["base"];
            $altura = $_POST["altura"];
            $resultado = ($base * $altura) / 2;
            $frase = "A área do triângulo retângulo de base $base e altura $altura metros é $resultado metros quadrados.";

            if ($resultado > 10) {
                echo "<h1>$frase</h1>";
            } else {
                echo "<h3>$frase</h3>";
            }
        }
    ?>
</body>
</html>


