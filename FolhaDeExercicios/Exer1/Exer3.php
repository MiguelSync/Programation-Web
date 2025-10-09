<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercicio 1</title>
</head>
<body>
    <h2>Calcula a área de um quadrado</h2>
    
    <form method="post">
        Lado do quadrado: <input type="number" name="Lado" required><br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    if (isset($_POST["Lado"]))  {
        $lado = $_POST["Lado"];

        $ladoCalculado = pow($lado, 2);

        echo "<p>“A área do quadrado de lado $lado metros é $ladoCalculado metros quadrados”</p>";
    }
    ?>
</body>
</html>
