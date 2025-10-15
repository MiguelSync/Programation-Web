<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exer4</title>
</head>
<body>
    <form method="POST">
    Lado A: <input type="number" name="a" step="any" required><br>
    Lado B: <input type="number" name="b" step="any" required><br>
    <button type="submit">Calcular</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $area = $a * $b;
        $frase = "A área do retângulo de lados $a e $b metros é $area metros quadrados.";

        if ($area > 10) {
            echo "<h1>$frase</h1>";
        } else {
            echo "<h3>$frase</h3>";
        }
    }
    ?>
</body>
</html>


